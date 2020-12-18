<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Purchased;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    private function greeting()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H');
        $name = Auth::user()->name;
        if ($jam >= 18) {
            $greeting = "Good Night ". $name;
        } elseif ($jam >= 12) {
            $greeting = "Good Afternoon ". $name;
        } elseif ($jam < 12) {
            $greeting = "Good Morning ". $name;
        }
        return $greeting;
    }
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        } elseif (Auth::user()->hasRole('user')){
            return view('users.dashboard', ['greeting'=>$this->greeting()]);
        }
    }

    public function myClass(){
        $user_id = Auth::user()->id;
        $purchaseds = Purchased::with(['class','user'])
                        ->where('user_id', $user_id)
                        ->get();
        return view('users.dashboard.myclass', compact('purchaseds'));
    }

    public function history(){
        $user_id = Auth::user()->id;
        $historys = Purchased::with(['class','user'])
                        ->where('user_id', $user_id)
                        ->get();
        return view('users.dashboard.history', compact('historys'));
    }

    public function profile(){
        return view('users.dashboard.profile');
    }

    private function bannedPasswords()
    {
        return [
            '12345678', '87654321', 'password', 'agung123',
            'dhani123', 'arya1234', 'yarra123'
        ];
    }

     // buat validasi password manual
    private function validatePasswords(array $data)
    {
        $messages = [
            'password.required' => 'Silahkan masukkan password Anda saat ini',
            'new-password.required' => 'Silahkan masukkan password baru',
            'new-password-confirmation.not_in' => 'Maaf, kata sandi umum tidak diperbolehkan. Silakan coba kata sandi baru yang lain.'
        ];

        $validator = Validator::make($data, [
            'password' => 'required',
            'new-password' => ['required', 'same:new-password', 'min:8', Rule::notIn($this->bannedPasswords())],
            'new-password-confirmation' => 'required|same:new-password',
        ], $messages);

        return $validator;
    }

    public function changePassword(Request $request)
    {
        if (Auth::check()) {
            $request_data = $request->All();
            $validator = $this->validatePasswords($request_data);

            if ($validator->fails()) {
                return back()->withErrors($validator->getMessageBag());
            } else {
                $current_password = Auth::user()->password;

                if (Hash::check($request_data['password'], $current_password)) {
                    $user_id = Auth::user()->id;
                    $user = User::find($user_id);
                    $user->password = Hash::make($request_data['new-password']);
                    $user->save();

                    return back()->with('success', 'Password Anda telah diubah');
                } else {
                    return back()->with('error', 'Maaf, password Anda saat ini tidak dikenali. Silahkan coba lagi');
                }   
            }
        } else {
            return redirect()->route('login');
        }
    }

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

            return redirect()->route('users.dashboard.profile.index')->with('success', 'profile berhasil diubah');
        } elseif (empty($request->hasFile('picture'))) {
            $user->update([
                'name' => $request->name,
                'picture' => $user->picture,
            ]);

            return redirect()->route('users.dashboard.profile.index')->with('success', 'profile berhasil diubah');
        } else {
            return redirect()->route('users.dashboard.profile.index')->with('error', 'profile gagal diubah');
        }
    }

}
