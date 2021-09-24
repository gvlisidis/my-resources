<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function index()
    {
        return view('snippets.index')->with('snippets' , auth()->user()->snippets()->paginate(12));
    }
}
