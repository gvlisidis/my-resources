<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = auth()->user()->resources()->paginate(12);

        return view('resources.index')->with([
            'resources' => $resources,
        ]);
    }

    public function edit(Resource $resource)
    {
        return view('resources.edit')->with([
            'resource' => $resource,
            'resource_types' => Resource::RESOURCE_TYPES,
        ]);
    }

    public function update(Request $request, Resource $resource)
    {
        dd($request->all());
    }
}
