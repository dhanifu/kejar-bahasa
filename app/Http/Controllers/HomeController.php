<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Purchased;
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
}
