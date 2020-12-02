<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classs;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classs::all();
        return view('users.class', compact('classes'));
    }

    public function class($code)
    {
        $class = Classs::where('code', $code)->first();
        return view('users.preview', compact('class'));
    }
}
