<x-app-layout>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        @foreach($resources->chunk(4) as $chunk)
                            <div class="flex justify-center">
                                @foreach($chunk as $resource)
                                    <div class="card flex flex-col justify-around w-80 p-3 bg-white shadow-lg rounded-lg my-10 h-48 {{ $loop->last ? 'mr-0' : 'mr-8' }}">
                                        <div class="flex justify-end">
                                            <a href="{{ route('resources.edit', $resource) }}" class="edit-button bg-red-500 text-white font-semibold text-xs w-8 rounded text-center right-0">Edit</a>
                                        </div>
                                        <div>
                                            <h2 class="text-gray-800 text-2xl font-bold"><a href="{{ $resource->url }}" target="_blank">{{ $resource->title }}</a></h2>
                                        </div>
                                        <div class="flex justify-end mt-4">
                                            <a href="#" class="text-xl font-medium text-indigo-500">Tags</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @endforeach
                    </div>
                </div>
                {{ $resources->onEachSide(2)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
