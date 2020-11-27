<?php

namespace App\Http\Controllers\admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'picture' => 'image|mimes:jpeg,jpg,png',
        ]);
            
        if ($request->hasFile('picture')) {
           
            $file = $request->file('picture');
            $filename = date('dmY').'-'.Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            
            $file->move(public_path('images/profile'), $filename);
            File::delete(public_path('images/profile/'. $user->picture));
            $user->update([
                'name' => $request->name,
                'picture' => $filename,
            ]);

            return redirect()->route('admin.profile.index')->with('success', 'profile berhasil diubah');
        } elseif (empty($request->hasFile('picture'))) {
            $user->update([
                'name' => $request->name,
                'picture' => $user->picture,
            ]);

            return redirect()->route('admin.profile.index')->with('success', 'profile berhasil diubah');
        } else {
            return redirect()->route('admin.profile.index')->with('error', 'profile gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
