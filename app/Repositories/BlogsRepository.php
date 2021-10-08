<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class BlogsRepository implements RepositoryInterface
{
    public function all()
    {
        if (!Cache::has('blogs-'.auth()->id())) {
            Cache::put('blogs-'.auth()->id(), auth()->user()->blogs()->paginate(12));
        }

        return Cache::get('blogs-'.auth()->id());
    }
}
