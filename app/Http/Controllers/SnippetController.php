<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function index()
    {
        return view('snippets.index')->with('snippets' , auth()->user()->snippets()->paginate(12));
    }

    public function show(Snippet $snippet)
    {
        return view('test', compact('snippet'));
    }
}
