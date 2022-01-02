@extends('resources.resources-layout')

@section('content')
    <div class="flex flex-col mb-8">
        <div class="ml-16 md:mr-16 mb-8">
            @include('resources.partials.search-field')
        </div>

        @include('resources.partials.resource', ['resources' => $articles, 'title' => 'Articles'])
        @include('resources.partials.resource', ['resources' => $blogs, 'title' => 'Blogs'])
        @include('resources.partials.resource', ['resources' => $snippets, 'title' => 'Snippets'])
        @include('resources.partials.resource', ['resources' => $videos, 'title' => 'Videos'])
        @include('resources.partials.resource', ['resources' => $packages, 'title' => 'Packages'])
        @include('resources.partials.resource', ['resources' => $books, 'title' => 'Books'])
    </div>

@endsection
