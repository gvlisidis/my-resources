<x-app-layout>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <form action="{{ route('resources.update', $resource) }}" method="post" class="">
                            @csrf
                            @method('patch')
                            <div class="flex flex-col">
                                <label for="title" class="font-bold">Title</label>
                                <input type="text" name="title" id="title" class="border-gray-500 rounded w-96 px-4 py-2" value="{{ $resource->title }}" />
                                @error('title')
                                    <div class="text-red-700 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col mt-8">
                                <label for="url" class="font-bold">Link</label>
                                <input type="text" name="url" id="url" class="border-gray-500 rounded w-96 px-4 py-2" value="{{ $resource->url }}" />
                                @error('url')
                                    <div class="text-red-700 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col mt-8">
                                <label for="type" class="font-bold">Resource Type</label>
                                <select class="rounded w-96" name="type">
                                    @foreach($resource_types as $key => $type)
                                        <option value="{{ $key }}" {{ $key == $resource->type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="text-red-700 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($resource->type === 2)
                                <div class="flex flex-col mt-8">
                                    <label for="description" class="font-bold">Description</label>
                                    <textarea name="description" id="description" cols="50" rows="10" class="rounded">{{ $resource->description }}</textarea>
                                </div>
                                @error('description')
                                    <div class="text-red-700 text-sm">{{ $message }}</div>
                                @enderror
                            @endif
                            <div class="flex justify-between mt-8 w-48">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-center rounded-xl">Update</button>
                                <a href="{{ route('resources.index') }}" class="px-4 py-2 bg-gray-500 text-white text-center rounded-xl">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
