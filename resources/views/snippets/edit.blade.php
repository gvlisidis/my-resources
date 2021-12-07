@extends('resources.resources-layout')

@section('content')
    <div class="fixed inset-0 container p-4 m-auto bg-white rounded-md shadow-md max-h-175">
        <h3 class="mb-4 text-lg font-bold">Edit Snippet</h3>
        <form class="w-full" action="{{ route('snippets.update', $snippet) }}" method="post">
            @csrf
            @method('patch')
            <div class="flex flex-col mb-4">
                <label for="title" class="font-bold">Title</label>
                <input type="text" name="title" id="title"
                       class="w-104 px-4 py-2 border-gray-500 rounded" value="{{ $snippet->title }}" />
                @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="body" class="font-bold">Body</label>
                <textarea name="body" id="body" class="w-full px-4 py-2 border-gray-500 rounded rounded-smt" rows="17" >{{ htmlspecialchars($snippet->body)  }}</textarea>
                @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="tags" class="font-bold">Tags (Comma seperated)</label>
                <input type="text" name="tags" id="tags"
                       class="w-full px-4 py-2 border-gray-500 rounded" value="{{ $tags }}"/>
                @error('tags')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex mt-8 justify-between">
                <div>
                    <x-button class="mr-4 bg-blue-500 hover:bg-blue-600" type="submit">Save</x-button>
                    <a href="#" class="mr-4 bg-gray-500 hover:bg-gray-600">Cancel</a>
                </div>
                <div>

                        <x-button class="mr-4 bg-red-500 hover:bg-red-600">
                            Delete
                        </x-button>

                </div>
            </div>
        </form>
    </div>

    <script>
        const editor = CKEDITOR.replace( 'body' );
    </script>

@endsection
