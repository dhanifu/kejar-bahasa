<?php

namespace App\Http\Controllers\Admin;

use App\Classs;
use App\Module;
use Auth;
use App\CategoryClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classs::latest()->get();
        
        return view('admin.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryClass::orderBy('name', 'ASC')->get();
        return view('admin.class.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:category_classes,id',
            'name' => 'required|string',
            'picture' => 'required|image|mimes:png,jpeg,jpg',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        $code = date('dmY'). strtolower(substr($request->name, 0, 2)) . Str::random(20);
        
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = date('dmY').'-'.Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            
            $classs = Classs::create([
                'code' => $code,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'picture' => $filename,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            $file->move(public_path('images/class'), $filename);
            
            return redirect()->route('admin.class.index')->with('success', 'Kelas Baru Ditambahkan');
        } else {
            return redirect()->route('admin.clsas.index')->with('error', 'Kelas Gagal Ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function edit(Classs $classs)
    {
        $categories = CategoryClass::orderBy('name', 'ASC')->get();

        return view('admin.class.edit', compact('classs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classs $classs)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:category_classes,id',
            'name' => 'required|string',
            'picture' => 'image|mimes:jpeg,jpg,png',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = date('dmY').'-'.Str::slug($request->name) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/class'), $filename);
            File::delete(public_path('images/class/'. $classs->picture));
            $classs->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'picture' => $filename,
                'price' => $request->price,
                'description' => $request->description,
            ]);


            return redirect()->route('admin.class.index')->with('success', 'Kelas berhasil diubah');
        } elseif (empty($request->hasFile('picture'))) {
            $classs->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'picture' => $classs->picture,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.class.index')->with('success', 'Kelas berhasil diubah');
        } else {
            return redirect()->route('admin.class.index')->with('error', 'Kelas gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classs $classs)
    {
        $module = $classs->with('module')->count();
        if ($module == 0) {
            File::delete(public_path('images/class/'. $classs->picture));
            $classs->delete();
            return redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
        }

        return redirect()->back()->with('error', 'Kelas ini tidak dapat dihapus, karena masih memiliki modul');
    }

    public function show(Classs $classs){
        return view('admin.class.show', compact('classs'));
    }


    
    public function showModule($id)
    {
        $modules = Module::where('class_id', $id)->orderBy('sort', 'ASC')->get();
        $kelas = Classs::find($id);
        if (empty($kelas)) {
            dd('Nanti Nampilin Halaman 404 Not Found, Karena Data Kelas Dengan ID:'.$id.' Tidak Ada');
        }
        return view('admin.class.module.index', compact('id', 'modules', 'kelas'));
    }

    public function sortModule(Request $request)
    {
        $modules = Module::all();

        foreach ($modules as $m) {
            foreach ($request->weight as $sort) {
                if ($sort['id'] == $m->id) {
                    $m->update(['sort' => $sort['position']]);
                }
            }
        }
        return response('Update berhasil', 200);
    }

    public function previewModule($id, Module $module)
    {
        $kelas = Classs::find($id);
        return view('admin.class.module.show', compact('id', 'kelas', 'module'));
    }

    public function newModule($id)
    {
        // $id = ID Kelas
        $kelas = Classs::find($id);
        if (empty($kelas)) {
            dd('Nanti Nampilin Halaman 404 Not Found, Karena Data Kelas Dengan ID:'.$id.' Tidak Ada');
        }
        return view('admin.class.module.new', compact('id', 'kelas'));
    }

    public function storeModule(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required'
        ]);
            
        // Nilai sort terakhir ditambah 1
        $m = Module::latest()->first();
        if (!empty($m)) {
            $m = $m->sort + 1;
        } else {
            $m = 1;
        }
        
        $code = date('dmY') . Str::random(14) . strtolower(substr($request->title, 0, 3));

        if (Auth::check()){
            $module = Module::create([
                'code' => $code,
                'class_id' => $id,
                'sort' => $m,
                'title' => $request->title,
                'content' => $request->content
            ]);
        }else{
            return redirect()->route('login');
        }

        if ($module->exists) {
            return redirect()->route('admin.class.module.index', $id)->with('success', 'Modul berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Modul gagal dibuat');
        }
    }

    public function uploadImageModule(Request $request, $id)
    {
        $class = Classs::find($id);
        
        if (!empty($request->file('upload'))) {
            $file = $request->file('upload');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $filename = $filename . "_" . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path("images/module/$class->name"), $filename);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset("images/module/$class->name/$filename");
            $msg = 'Image uploaded successfuly';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor,'$url','$msg')</script>";
            
            @header('Content-type: text/html; charset=utf-8');

            return $response;
        }
    }

    public function editModule($id, Module $module)
    {
        $kelas = Classs::find($id);
        return view('admin.class.module.edit', compact('id', 'module', 'kelas'));
    }

    public function updateModule(Request $request, $id, Module $module)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required'
        ]);

        if (Auth::check()){
            try {
                $module->update([
                    'title' => $request->title,
                    'content' => $request->content
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()
                        ->with('error', 'Modul gagal diupdate ('.$e.')');
            }
    
            return redirect()->route('admin.class.module.index', $id)
                    ->with('success', 'Modul berhasil diupdate');
        }else{
            return redirect()->route('login');
        }
    }

    public function deleteModule($id, Module $module)
    {
        $module->delete();

        if($module->exists){
            return redirect()->back()->with('error', 'Modul tidak terhapus');
        }

        return redirect()->back()->with('success', 'Modul berhasil terhapus');
    }
}
