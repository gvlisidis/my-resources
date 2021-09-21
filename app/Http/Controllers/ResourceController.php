<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    public function index()
    {
        if (!Cache::has('resources-' . auth()->id())) {
            Cache::put('resources-' . auth()->id(), auth()->user()->resources()->latest()->get()->groupBy(function ($item, $key) {
                return Str::plural(Resource::RESOURCE_TYPES[$item['type']]);
            })->transform(function ($item) {
                return $item->take(4);
            }));
        }

        $resources = Cache::get('resources-' . auth()->id());

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

    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        $data = $request->validated();
        $resource->update($data);

        return redirect()->route('resources.index');
    }

    public function create()
    {
        return view('resources.create')->with([
            'resource_types' => Resource::RESOURCE_TYPES,
        ]);
    }

    public function store(CreateResourceRequest $request)
    {
        $data = $request->validated();
        $request->user()->resources()->create($data);

        return redirect()->route('resources.index');
    }

    public function selectedResource($key)
    {
        $name = Str::ucfirst($key);
        $type = Str::singular($name);
        if (!Cache::has($key . '-' . auth()->id())) {
            Cache::put(
                $key . '-' . auth()->id(),
                auth()->user()
                    ->resources()
                    ->whereType(Resource::getResourceType($type))
                    ->get()
            );
        }

        $resources = Cache::get($key . '-' . auth()->id());

        return view('resources.resource')->with([
            'resources' => $resources,
            'name' => $name,
        ]);
    }
}
