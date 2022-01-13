@extends('resources.resources-layout')

@section('content')
    <div class="relative">
        <div class="flex flex-col">
            <div class="md:ml-16 md:mr-16">
                @include('resources.partials.search-field')
            </div>
            <div class="flex flex-col md:flex-row mb-4 justify-center items-center md:justify-between">
                <p class="md:ml-16 text-2xl mb-4 md:mb-0 font-bold text-purple-800">Snippets</p>
                <div class="md:mr-16">
                    <a href="{{ route('snippets.create') }}"
                       class="px-4 py-2 text-center text-white bg-green-500 rounded hover:bg-green-600">Add New
                        Snippet</a>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 xl:grid-cols-4">
                @forelse ($snippets as $snippet)
                    <div  x-data="{open: false}">
                        <div
                            @mouseover="open = true" @mouseover.away = "open = false"
                            class="flex flex-col justify-around h-48 px-3 pt-0 my-2 md:my-10 bg-white rounded-lg shadow-lg card w-80">
                            <div class="flex justify-between h-4">
                                <div class="text-xxs text-gray-400">{{ $snippet->created_at->format('F jS, Y') }}</div>
                                <a href="{{ route('snippets.edit', $snippet) }}"
                                   x-show="open"
                                   class="w-8 text-xs font-semibold text-center text-white bg-red-500 rounded edit-button hover:bg-red-600">
                                    Edit
                                </a>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-gray-800"><a href="{{ route('snippets.show', $snippet) }}"
                                                                               target="_blank">{{ $snippet->title }}</a>
                                </h2>
                            </div>
                            <div class="flex justify-start mt-4">
                                @foreach($snippet->tags as $tag)
                                    <div class="mr-2">
                                        <a href="{{ route('tags.show', $tag) }}"
                                           class="text-xxs bg-gray-200 px-2 text-gray-600 rounded rounded-xl">#{{ $tag->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="">No snippets found!</p>
                @endforelse
            </div>
        </div>
        <div>
            {{ $snippets->links() }}
        </div>

    </div>
@endsection
