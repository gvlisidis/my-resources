<div class="flex flex-col">
    <div class="flex justify-between">
        <p class="ml-12 text-2xl font-bold text-purple-800">Articlessss</p>
        <div class="mr-12 ">
            <button wire:click="create()"
                class="px-4 py-2 text-center text-white bg-green-500 rounded hover:bg-green-600">Create New
                Articles</button>
        </div>
    </div>
    @if ($isOpen)
        @include('livewire.articles.create-article', ['method' => $method])
    @endif

    <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-4">
        @foreach ($articles as $article)
            <div class="flex flex-col justify-around h-48 px-3 pt-0 pb-3 my-10 bg-white rounded-lg shadow-lg card w-80">
                <div class="flex justify-end h-4">
                    <button wire:click="edit({{ $article->id}})"
                        class="w-8 text-xs font-semibold text-center text-white bg-red-500 rounded edit-button hover:bg-red-600">Edit</button>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800"><a href="{{ $article->url }}"
                            target="_blank">{{ $article->title }}</a>
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
    {{ $articles->links() }}
</div>
