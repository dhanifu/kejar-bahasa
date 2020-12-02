<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
   
    public function index()
    {
        $abouts = About::latest()->get();
        return view('admin.about.index', compact('abouts'));
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $this->validate($request, [
            'banner' => 'image|mimes:jpeg,jpg,png',
            'about' => 'required',
        ]);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = date('dmY').'-'. 'about'. '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/about'), $filename);
            File::delete(public_path('images/about/'. $about->banner));
            $about->update([
                'banner' => $filename,
                'about' => $request->about,
            ]);


            return redirect()->route('admin.about.index')->with('success', 'About berhasil diubah');
        } elseif (empty($request->hasFile('banner'))) {
            $about->update([
                'banner' => $banner->banner,
                'about' => $request->about,
            ]);

            return redirect()->route('admin.about.index')->with('success', 'About berhasil diubah');
        } else {
            return redirect()->route('admin.about.index')->with('error', 'About gagal diubah');
        }
    }

    public function show(About $about)
    {
        //
    }

}
