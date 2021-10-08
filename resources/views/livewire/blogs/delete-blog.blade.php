<div class="fixed inset-0 bg-gray-900 opacity-90"></div>
<div class="fixed inset-0 max-w-md p-4 m-auto bg-gray-400 rounded-md h-36 shadow-md z-30">
    <h3 class="mb-4 text-lg font-bold">Confirm Delete Blog</h3>
    <div class="flex">
        <x-button class="mr-4 bg-red-500 hover:bg-red-600" wire:click.prevent="delete({{ $blog_id }})">
            Delete
        </x-button>
        <x-button class="mr-4 bg-gray-500 hover:bg-gray-600" wire:click.prevent="closeConfirmDeleteModal()">Cancel
        </x-button>
    </div>
</div>

