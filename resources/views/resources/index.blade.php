@extends('resources.resources-layout')

@section('content')

@include('resources.partials.resource', ['resources' => $articles, 'title' => 'Articles'])
@include('resources.partials.resource', ['resources' => $blogs, 'title' => 'Blogs'])
@include('resources.partials.resource', ['resources' => $snippets, 'title' => 'Snippets'])
@include('resources.partials.resource', ['resources' => $videos, 'title' => 'Videos'])
@include('resources.partials.resource', ['resources' => $packages, 'title' => 'Packages'])
@include('resources.partials.resource', ['resources' => $books, 'title' => 'Books'])

@endsection