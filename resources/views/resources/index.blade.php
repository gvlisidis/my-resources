@extends('resources.resources-layout')

@section('content')
    @include('resources.partials.create-button')
    <div class="flex flex-col">
        @foreach($resources as $key => $chunk)
            <div class="flex flex-col items-center {{ $loop->first ? '' : 'mt-20' }}">
                <p class="font-bold text-2xl text-purple-800">{{ $key }}</p>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 mx-auto">
                    @foreach($chunk as $resource)
                        <div
                            class="card flex flex-col justify-around w-80 p-3 bg-white shadow-lg rounded-lg my-10 h-48">
                            <div class="flex justify-end">
                                <a href="{{ route('resources.edit', $resource) }}"
                                   class="edit-button bg-red-500 hover:bg-red-600 text-white font-semibold text-xs w-8 rounded text-center right-0">Edit</a>
                            </div>
                            <div>
                                <h2 class="text-gray-800 text-2xl font-bold"><a
                                        href="{{ $resource->url }}"
                                        target="_blank">{{ $resource->title }}</a>
                                </h2>
                            </div>
                            <div class="flex justify-end mt-4">
                                <a href="#" class="text-xl font-medium text-indigo-500">Tags</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center">
                    <a href="{{ route('resources.selected', \Illuminate\Support\Str::lower($key)) }}"
                       class=" px-4 py-2 bg-purple-500 text-white text-center rounded hover:bg-purple-600">Show all</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
