<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('videos.index')->with('videos' , auth()->user()->videos()->paginate(12));
    }
}
