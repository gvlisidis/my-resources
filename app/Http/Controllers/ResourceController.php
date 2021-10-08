<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('resources.index')->with([
            'articles' => $user->articles()->take(4)->get(),
            'blogs' => $user->blogs()->take(4)->get(),
            'packages' => $user->packages()->take(4)->get(),
            'videos' => $user->videos()->take(4)->get(),
            'snippets' => $user->videos()->take(4)->get(),
            'books' => $user->books()->take(4)->get(),
        ]);
    }

    public function resourceIndex(Request $request)
    {
        return view($request->route()->uri . '.index');
    }
}
