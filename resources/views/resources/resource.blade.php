@extends('resources.resources-layout')

@section('content')
    <div class="flex justify-between">
        @include('resources.partials.create-button')
        @include('resources.partials.back-button')

    </div>
    <div class="flex flex-col">
        <div class="flex justify-center mb-10">
            <p class="font-bold text-lg text-purple-800">{{ $name }}</p>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 mx-auto">
            @foreach($resources as $resource)
                <div
                    class="card flex flex-col justify-around w-80 p-3 bg-white shadow-lg rounded-lg h-48">
                    <div class="flex justify-end">
                        <a href="{{ route('resources.edit', $resource) }}"
                           class="edit-button bg-red-500 text-white font-semibold text-xs w-8 rounded text-center right-0">Edit</a>
                    </div>
                    <div>
                        <h2 class="text-gray-800 text-2xl font-bold"><a href="{{ $resource->url }}"
                                                                        target="_blank">{{ $resource->title }}</a>
                        </h2>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-indigo-500">Tags</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
