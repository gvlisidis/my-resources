<div class="flex flex-col">
    <div class="flex justify-between">
        <p class="ml-12 text-2xl font-bold text-purple-800">{{ \Illuminate\Support\Str::title($resource->title) }}</p>
        <div class="mr-12 ">
            <button wire:click="create()"
                    class="px-4 py-2 text-center text-white bg-green-500 rounded hover:bg-green-600">Create New
                {{ \Illuminate\Support\Str::title($resource->title) }}</button>
        </div>
    </div>
    @if ($isOpen)
        @include('livewire.books.create-book')
    @endif

    <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-4">
        @foreach ($books as $book)
            <div class="flex flex-col justify-around h-48 px-3 pt-0 pb-3 my-10 bg-white rounded-lg shadow-lg card w-80">
                <div class="flex justify-end h-4">
                    <button wire:click="edit({{ $book->id }})"
                            class="w-8 text-xs font-semibold text-center text-white bg-red-500 rounded edit-button hover:bg-red-600">Edit</button>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><a href="{{ $book->url }}"
                                                                    target="_blank">{{ $book->title }}</a>
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
    {{ $books->links() }}
</div>
