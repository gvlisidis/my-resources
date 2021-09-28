<div class="fixed inset-0 bg-gray-900 opacity-90"></div>
<div class="fixed inset-0 max-w-md p-4 m-auto bg-white rounded-md shadow-md max-h-104" @click.away="editArticleModal = false">
    <h3 class="mb-4 text-lg font-bold">Edit Article</h3>
    <form class="w-104" wire:submit.prevent="update" action="#" method="post">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="title" class="font-bold">Title</label>
            <input type="text" wire:model='title' name="title" id="title"
                class="w-full px-4 py-2 border-gray-500 rounded" value="" />
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-4">
            <label for="author" class="font-bold">Author</label>
            <input type="text" name="author" wire:model='author' id="author"
                class="w-full px-4 py-2 border-gray-500 rounded" value="" />
            @error('author')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="url" class="font-bold">Link</label>
            <input type="text" name="url" wire:model='url' id="url" class="w-full px-4 py-2 border-gray-500 rounded"
                value="" />
            @error('url')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-8">
            <x-button class="bg-blue-500 hover:bg-blue-600">Save</x-button>
        </div>

    </form>
</div>