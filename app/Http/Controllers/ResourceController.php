<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('resources.index')->with([
            'articles' => $user->articles()->with('tags')->take(4)->get(),
            'blogs' => $user->blogs()->with('tags')->take(4)->get(),
            'packages' => $user->packages()->with('tags')->take(4)->get(),
            'videos' => $user->videos()->with('tags')->take(4)->get(),
            'snippets' => $user->videos()->with('tags')->take(4)->get(),
            'books' => $user->books()->with('tags')->take(4)->get(),
        ]);
    }

    public function resourceIndex(Request $request)
    {
        return view($request->route()->uri . '.index');
    }
}
