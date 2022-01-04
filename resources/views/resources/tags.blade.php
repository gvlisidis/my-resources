@extends('resources.resources-layout')

@section('content')
    <div class="flex flex-col mb-8">
        <div class="ml-16 md:mr-16">
            @include('resources.partials.search-field')
            <p class=" text-3xl font-bold text-black md:mb-10">Tag: #{{ $tagName }}</p>
            @foreach($searchResults as $type => $modelSearchResults)
                @if($modelSearchResults->count() > 0)
                    <p class=" text-2xl font-bold text-purple-800">{{ $type }}</p>
                    <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-4">
                        @foreach($modelSearchResults as $resource)
                            <div
                                class="flex flex-col h-48 p-3 pb-0 pt-2 my-2 md:mb-10 md:mt-4 bg-white rounded-lg shadow-lg card w-80">
                                <div>
                                    <div
                                        class="text-xxs text-gray-400">{{ $resource->created_at->format('F jS, Y') }}</div>
                                </div>
                                <div class="flex flex-col h-full justify-center">
                                    <h2 class="text-lg font-bold text-gray-800">
                                        <a href="{{ $type === 'Snippets' ? route('snippets.show', $resource) : $resource->url }}" target="_blank">{{ $resource->title }}</a>
                                    </h2>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
