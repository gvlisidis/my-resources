<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function index()
    {
        return view('snippets.index')->with('snippets', auth()->user()->snippets()->with('tags')->paginate(12));
    }

    public function show(Snippet $snippet)
    {
        return view('snippets.show', compact('snippet'));
    }

    public function create()
    {
        return view('snippets.create');
    }

    public function store(Request $request)
    {
       $data = $request->only('title', 'body');

       Snippet::create($data + ['user_id' => auth()->id()]);

       return redirect()->route('snippets.index');
    }

    public function edit(Snippet $snippet)
    {
        return view('snippets.edit', compact('snippet'));
    }

    public function update(Request $request, Snippet $snippet)
    {
        $data = $request->only('title', 'body');

        $snippet->update($data + ['user_id' => auth()->id()]);

        return redirect()->route('snippets.index');
    }
}
