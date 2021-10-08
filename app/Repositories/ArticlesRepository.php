<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class ArticlesRepository implements RepositoryInterface
{

    public function all()
    {
        if (!Cache::has('articles-'.auth()->id())) {
            Cache::put('articles-'.auth()->id(), auth()->user()->articles()->paginate(12));
        }

        return Cache::get('articles-'.auth()->id());
    }
}
