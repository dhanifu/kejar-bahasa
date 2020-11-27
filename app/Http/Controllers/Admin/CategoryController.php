<?php

namespace App\Http\Controllers\Admin;

use App\CategoryClass;
use App\Classs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryClass::orderBy('created_at', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
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
            'name' => 'required|string|unique:category_classes'
        ]);

        CategoryClass::create($request->except('_token'));

        return redirect()->back()->with("success", "Kategori Berhasil Ditambah");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryClass  $categoryClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryClass $categoryClass)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:category_classes,name,'.$categoryClass->id
        ]);

        $categoryClass->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryClass  $categoryClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryClass $categoryClass)
    {
        if ($categoryClass->class_count == 0) {
            $categoryClass->delete();
            return redirect()->back()->with('success', 'Kategori Berhasil Dihapus');
        }

        return redirect()->back()->with('error', 'Kategori Gagal Dihapus, karena memiliki masih Class');
    }
}
