<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Models\Resource;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
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
        $resourceString = $request->route()->uri;
        $user = $request->user();
        $user->setRelation($resourceString);
        dd($user);

        return view($resourceString . '.index')->with($resourceString, auth()->user()->articles()->paginate(12));
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

        $resource->update([
            'title' => $data['title'],
            'url' => $data['url'],
            'description' =>    htmlspecialchars_decode($data['description']),
            'type' => $data['type'],
        ]);
        Cache::forget(Str::singular(Str::ucfirst(Resource::RESOURCE_TYPES[$data['type']])) . '-' . auth()->id());

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
                request()->user()
                    ->resources()
                    ->whereType(Resource::getResourceType($type))
                    ->latest()
                    ->get()
            );
        }

        $resources = Cache::get($key . '-' . auth()->id());

        return view('resources.resource')->with([
            'resources' => $resources,
            'name' => $name,
        ]);
    }

    public function snippet(Resource $resource)
    {
        return view('resources.snippet')->with(['snippet' => $resource]);
    }
}
