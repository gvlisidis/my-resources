<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        return view('articles.index')->with('articles' , auth()->user()->articles()->paginate(12));
    }
}