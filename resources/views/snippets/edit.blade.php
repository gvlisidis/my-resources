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
                       class="w-104 px-4 py-2 border-gray-500 rounded" value="{{ $snippet->title }}"/>
                @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="body" class="font-bold">Body</label>
                <textarea name="body" id="body" class="w-full px-4 py-2 border-gray-500 rounded rounded-smt"
                          rows="14">{{ $snippet->body  }}</textarea>
                @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="tags" class="font-bold">Tags (Comma seperated)</label>
                <input type="text" name="tags" id="tags"
                       class="w-full px-4 py-2 border-gray-500 rounded"
                       value="{{ \Illuminate\Support\Str::remove(['[', ']', '"'], $snippet->tags->pluck('name')) }}"/>
                @error('tags')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex mt-8 justify-between">
                <div>
                    <button class="mr-4 bg-blue-500 hover:bg-blue-600 text-white w-22 h-8 rounded rounded-lg"
                            type="submit">Save
                    </button>
                    <a href="{{ route('snippets.index') }}"
                       class="bg-black hover:bg-gray-600 text-white px-5 py-1 rounded rounded-lg">Cancel</a>
                </div>

            </div>
        </form>
        <div class="flex justify-end -mt-8">
            <form action="{{  route('snippets.delete', $snippet) }}" method="post">
                @csrf
                @method('delete')
                <button class="mr-4 bg-red-500 hover:bg-red-600 text-white w-22 h-8 rounded rounded-lg"
                        type="submit">Delete
                </button>
            </form>
        </div>
    </div>

    <script>
        const editor = CKEDITOR.replace('body');
    </script>

@endsection


egg man is destroying the world.
