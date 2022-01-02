<div class="mb-8">
    <form action="{{ route('search') }}" method="GET" class="flex justify-center">
        <div class="w-4/5 mr-4">
            <input type="search" name="searchTerm" class="w-full rounded-md" value="{{ $searchTerm }}">
        </div>
        <div class="w-1/5 mr-4">
            <select name="model" class="w-full rounded-md">
                <option value="" {{ !$model ? 'selected' : '' }}></option>
                <option value="article" {{ $model == 'article' ? 'selected' : '' }}>Articles</option>
                <option value="snippet" {{ $model == 'snippet' ? 'selected' : '' }}>Snippets</option>
                <option value="blog" {{ $model == 'blog' ? 'selected' : '' }}>Blogs</option>
                <option value="package" {{ $model == 'package' ? 'selected' : '' }}>Packages</option>
                <option value="video" {{ $model == 'video' ? 'selected' : '' }}>Videos</option>
                <option value="book" {{ $model == 'book' ? 'selected' : '' }}>Books</option>
            </select>
        </div>
        <button class="h-10  bg-green-500 rounded-md px-4 py-2 text-white font-semibold" type="submit">
            Search
        </button>
    </form>
</div>
