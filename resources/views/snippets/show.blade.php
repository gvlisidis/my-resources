@extends('resources.resources-layout')

@section('content')
    <div class="max-w-4xl bg-gray-200 mx-auto">
        <div class="flex flex-col mx-auto">
            <div>
                <p class="text-xl font-bold">{{ ucfirst($snippet->title) }}</p>
            </div>

            <div>
                {!! $snippet->body  !!}
            </div>
        </div>
    </div>

@endsection
