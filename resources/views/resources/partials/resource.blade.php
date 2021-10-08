<div class="flex flex-col mb-8">
    <p class="ml-12 text-2xl font-bold text-purple-800">{{ $title }}</p>
    <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-4">
        @forelse($resources as $resource)
            <div class="flex flex-col justify-around h-48 p-3 my-10 bg-white rounded-lg shadow-lg card w-80">
                <div>
                    <h2 class="text-lg font-bold text-gray-800"><a href="{{ $resource->url }}"
                                                                    target="_blank">{{ $resource->title }}</a>
                    </h2>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-indigo-500">Tags</a>
                </div>
            </div>
        @empty
            <p class="ml-32 w-full">There are no {{ $title }} available</p>
        @endforelse
    </div>
    @if($resources->count())
        <div class="flex justify-center">
            <a href="{{ route( Str::lower($title) . '.index') }}"
               class="px-4 py-2 text-center text-white bg-purple-500 rounded  hover:bg-purple-600">Show
                all {{ $title }}</a>
        </div>
    @endif
</div>
