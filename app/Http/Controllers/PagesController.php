<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classs;

class PagesController extends Controller
{
    public function welcome()
    {
        $classes = Classs::orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('welcome', compact('classes'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
