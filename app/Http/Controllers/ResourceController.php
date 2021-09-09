<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = auth()->user()->resources()->paginate(12);

        return view('resources.index', compact('resources'));
    }

    public function show(Resource $resource)
    {
        return view('resources.show');
    }
}
