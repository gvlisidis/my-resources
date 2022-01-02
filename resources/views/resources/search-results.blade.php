@extends('resources.resources-layout')

@section('content')
    <div class="flex flex-col mb-8">
        <div class="ml-16 md:mr-16">
            @include('resources.partials.search-field')

            @if($searchResults->count())
                @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                    <p class=" text-2xl font-bold text-purple-800">{{ \Illuminate\Support\Str::ucfirst($type) }}</p>
                    <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-4">
                        @foreach($modelSearchResults as $resource)

                            <div
                                class="flex flex-col justify-around h-48 p-3 py-0 my-2 md:my-10 bg-white rounded-lg shadow-lg card w-80">
                                <div>
                                    <div
                                        class="text-xxs text-gray-400">{{ $resource->searchable->created_at->format('F jS, Y') }}</div>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-gray-800"><a href="{{ $resource->searchable->url }}"
                                                                                   target="_blank">{{ $resource->searchable->title }}</a>
                                    </h2>
                                </div>
                                <div class="flex justify-start mt-4">
                                    @foreach($resource->searchable->tags as $tag)
                                        <div class="mr-2">
                                            <a href="#"
                                               class="text-xxs bg-gray-200 px-2 text-gray-600 rounded rounded-xl">#{{ $tag->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <p class="text-lg">No results found.</p>
            @endif
        </div>
    </div>

@endsection
