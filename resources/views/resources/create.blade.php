@extends('resources.resources-layout')

@section('content')
    <div class="flex justify-center">
        <form action="{{ route('resources.store') }}" method="post" class="w-104">
            @csrf
            <div class="flex flex-col">
                <label for="title" class="font-bold">Title</label>
                <input type="text" name="title" id="title"
                       class="border-gray-500 rounded w-full px-4 py-2" value=""/>
            </div>
            <div class="flex flex-col mt-8">
                <label for="url" class="font-bold">Link</label>
                <input type="text" name="url" id="url" class="border-gray-500 rounded w-full px-4 py-2"
                       value=""/>
            </div>
            <div class="flex flex-col mt-8">
                <label for="type" class="font-bold">Resource Type</label>
                <select name="type" id="type" class="rounded w-full">
                    @foreach($resource_types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col mt-8">
                <label for="description" class="font-bold">Description</label>
                <textarea name="description" id="description" cols="50" rows="10"
                          class="rounded"></textarea>
            </div>

            <div class="mt-8">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-center rounded-xl">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
