@extends('resources.resources-layout')

@section('content')
<div class="flex flex-col">
    <p class="font-bold text-2xl ml-12 text-purple-800">Blogs</p>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 mx-auto">
        @foreach($blogs as $blog)
        <div class="card  flex flex-col justify-around w-80 p-3 bg-white shadow-lg rounded-lg my-10 h-48">
            <div class="flex justify-end h-4">
                <a href="#" class="edit-button bg-red-500 hover:bg-red-600 text-white font-semibold text-xs w-8 rounded text-center">Edit</a>
            </div>
            <div>
                <h2 class="text-gray-800 text-2xl font-bold"><a href="{{ $blog->url }}" target="_blank">{{ $blog->title }}</a>
                </h2>
            </div>
            <div class="flex justify-end mt-4">
                <a href="#" class="text-xl font-medium text-indigo-500">Tags</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div>
{{ $blogs->links() }}
</div>
@endsection