@extends('resources.resources-layout')

@section('content')
Snippet

<br />

<pre>
    <code class="php">
        {{ $snippet->description }}
    </code>
</pre>
@endsection