@extends('resources.resources-layout')

@section('content')
    <div class="relative">
        <div class="flex flex-col">
            <div class="flex justify-between">
                <p class="ml-12 text-2xl font-bold text-purple-800">Snippets</p>
                <div class="mr-12 ">
                    <a href="{{ route('snippets.create') }}"
                       class="px-4 py-2 text-center text-white bg-green-500 rounded hover:bg-green-600">Add New
                        Snippet</a>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-4">
                @foreach ($snippets as $snippet)
                    <div  x-data="{open: false}">
                        <div
                            @mouseover="open = true" @mouseover.away = "open = false"
                            class="flex flex-col justify-around h-48 px-3 pt-0 my-10 bg-white rounded-lg shadow-lg card w-80">
                            <div class="flex justify-end h-4">
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
                                        <a href="#"
                                           class="text-xxs bg-gray-200 px-2 text-gray-600 rounded rounded-xl">#{{ $tag->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
        <div>
            {{ $snippets->links() }}
        </div>

    </div>
@endsection
