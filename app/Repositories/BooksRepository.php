<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class BooksRepository implements RepositoryInterface
{

    public function all()
    {
        if (!Cache::has('books-'.auth()->id())) {
            Cache::put('books-'.auth()->id(), auth()->user()->books()->paginate(12));
        }

        return Cache::get('books-'.auth()->id());
    }
}
