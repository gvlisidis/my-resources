<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;

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
            'snippets' => $user->snippets()->take(4)->get(),
            'books' => $user->books()->with('tags')->take(4)->get(),
            'searchTerm' => $request->searchTerm,
            'model' => $request->model,
        ]);
    }

    public function resourceIndex(Request $request)
    {
        return view($request->route()->uri.'.index');
    }


    public function search(Request $request)
    {
        if (!$request->searchTerm) {
            return redirect()->back();
        }

        $searchService = new SearchService($request->only('searchTerm', 'model'));

        return view('resources/search-results')->with([
            'searchResults' => $searchService->search(),
            'searchTerm' => $request->searchTerm,
            'model' => $request->model,
        ]);
    }
}
