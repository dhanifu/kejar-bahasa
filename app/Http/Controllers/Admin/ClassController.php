<?php

namespace App\Http\Controllers\Admin;

use App\Classs;
use App\CategoryClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClassController extends Controller
{
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
        if ($classs->category_count == 0) {
            File::delete(public_path('images/class/'. $classs->picture));
            $classs->delete();
            return redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
        }

        return redirect()->back()->with('error', 'Kelas Mempunyai Modul');
    }

    public function show(Classs $classs){
        return view('admin.class.show', compact('classs'));
    }
}
