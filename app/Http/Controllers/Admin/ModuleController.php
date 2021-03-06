<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Module;
use App\Classs;
use App\CategoryClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ModuleController extends Controller
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
        $modules = Module::with('class')->get();
        return view('admin.module.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryClass::with('class')->orderBy('name', 'ASC')->get();
        return view('admin.module.create', compact('categories'));
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
            'class_id' => 'required|exists:classses,id',
            'title' => 'required|string',
            'content' => 'required'
        ]);
        
        $code = date('dmY') . Str::random(14) . strtolower(substr($request->title, 0, 3));

        $module = Module::create([
            'code' => $code,
            'class_id' => $request->class_id,
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($module->exists) {
            return redirect()->route('admin.module.index')->with('success', 'Modul berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Modul gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('admin.module.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $categories = CategoryClass::with('class')->orderBy('name', 'ASC')->get();
        return view('admin.module.edit', compact('module', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $this->validate($request, [
            'class_id' => 'required|exists:classses,id',
            'title' => 'required|string',
            'content' => 'required'
        ]);

        try {
            $module->update([
                'class_id' => $request->class_id,
                'title' => $request->title,
                'content' => $request->content
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                    ->with('error', 'Modul gagal diupdate ('.$e.')');
        }

        return redirect()->route('admin.module.index')
                ->with('success', 'Modul berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();

        if ($module->exists) {
            return redirect()->back()->with('error', 'Modul tidak terhapus');
        }
        
        return redirect()->back()->with('success', 'Modul berhasil dihapus');
    }
}
