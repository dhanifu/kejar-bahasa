<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct(){
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

    public function dashboard()
    {
        return view('admin.dashboard', ['greeting'=>$this->greeting()]);
    }
}
