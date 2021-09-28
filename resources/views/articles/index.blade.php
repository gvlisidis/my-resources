@extends('resources.resources-layout')

@section('content')


    <div x-data="{ isOpen: false, editArticleModal: false }" class="relative">

        @livewire('articles')


        <div x-cloak x-show="isOpen" @keydown.escape.window="isOpen = false" class="flex justify-center">
            @livewire('create-article')
        </div>

        <div x-cloak x-show="editArticleModal" @keydown.escape.window="editArticleModal = false" class="flex justify-center">
            @livewire('edit-article')
        </div>

        <div>
            @if (session('success_message'))
                <div x-data="{isOpen: false}">
                </div>
            @endif
        </div>
    </div>
@endsection
