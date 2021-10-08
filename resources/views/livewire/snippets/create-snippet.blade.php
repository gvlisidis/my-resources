<div class="fixed inset-0 bg-gray-900 opacity-90"></div>
<div class="fixed inset-0 max-w-md p-4 m-auto bg-white rounded-md shadow-md max-h-104">
    <h3 class="mb-4 text-lg font-bold">{{ $method == 'create' ? 'Add New' : 'Edit'}} Snippet</h3>
    <form class="w-104" wire:submit.prevent="create" action="#" method="post">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="title" class="font-bold">Title</label>
            <input type="text" wire:model='title' name="title" id="title"
                class="w-full px-4 py-2 border-gray-500 rounded" value="" />
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="body" class="font-bold">Body</label>
            <textarea name="body" wire:model='body' id="body"
                      class="w-full px-4 py-2 border-gray-500 rounded" value="" rows="4" cols="80"></textarea>
            @error('body')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex mt-8 justify-between">
            <div>
                <x-button class="mr-4 bg-blue-500 hover:bg-blue-600" wire:click.prevent="store()">Save</x-button>
                <x-button class="mr-4 bg-gray-500 hover:bg-gray-600" wire:click.prevent="closeModal()">Cancel</x-button>
            </div>
            <div>
                @if($method == 'update')
                    <x-button class="mr-4 bg-red-500 hover:bg-red-600" wire:click.prevent="delete({{ $snippet_id }})">
                        Delete
                    </x-button>
                @endif
            </div>
        </div>
    </form>
</div>
