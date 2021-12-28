<div class="flex flex-col mb-8">
    <p class="ml-16 pl-2 text-2xl font-bold text-purple-800">{{ $title }}</p>
    <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-4">
        @forelse($resources as $resource)
            <div class="flex flex-col justify-around h-48 p-3 py-0 my-2 md:my-10 bg-white rounded-lg shadow-lg card w-80">
                <div>
                    <div class="text-xxs text-gray-400">{{ $resource->created_at->format('F jS, Y') }}</div>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800"><a href="{{ $resource->url }}"
                                                                    target="_blank">{{ $resource->title }}</a>
                    </h2>
                </div>
                <div class="flex justify-start mt-4">
                    @foreach($resource->tags as $tag)
                        <div class="mr-2">
                            <a href="#" class="text-xxs bg-gray-200 px-2 text-gray-600 rounded rounded-xl">#{{ $tag->name }}</a>
                        </div>
                    @endforeach
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
