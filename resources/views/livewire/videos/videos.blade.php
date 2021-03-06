<div class="flex flex-col">
    <div class="md:ml-16 md:mr-16">
        @include('resources.partials.search-field')
    </div>
    <div class="flex flex-col md:flex-row mb-4 justify-center items-center md:justify-between">
        <p class="md:ml-16 text-2xl mb-4 md:mb-0 font-bold text-purple-800">Videos</p>
        <div class="md:mr-16">
            <button wire:click="create()"
                class="px-4 py-2 text-center text-white bg-green-500 rounded hover:bg-green-600">Add New
                Video</button>
        </div>
    </div>
    @if ($isOpen)
        @include('livewire.videos.create-video')
    @endif

    <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 xl:grid-cols-4">
        @forelse ($videos as $video)
            <div x-data="{open: false}">
                <div class="flex flex-col justify-around h-48 px-3 py-0 my-2 md:my-10 bg-white rounded-lg shadow-lg card w-80" @mouseover="open = true" @mouseover.away = "open = false">
                    <div class="flex justify-between h-4">
                        <div class="text-xxs text-gray-400">{{ $video->created_at->format('F jS, Y') }}</div>
                        <button wire:click="edit({{ $video->id }})"
                                class="w-8 text-xs font-semibold text-center text-white bg-red-500 rounded edit-button hover:bg-red-600" x-show="open">Edit</button>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-800"><a href="{{ $video->url }}"
                                                                       target="_blank">{{ $video->title }}</a>
                        </h2>
                    </div>
                    <div class="flex justify-start mt-4">
                        @foreach($video->tags as $tag)
                            <div class="mr-2">
                                <a href="{{ route('tags.show', $tag) }}" class="text-xxs bg-gray-200 px-2 text-gray-600 rounded rounded-xl">#{{ $tag->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <p class="">No videos found!</p>
        @endforelse
    </div>
</div>
<div>
    {{ $videos->links() }}
</div>
