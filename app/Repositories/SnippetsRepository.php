<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class SnippetsRepository implements RepositoryInterface
{
    public function all()
    {
        if (!Cache::has('snippets-'.auth()->id())) {
            Cache::put('snippets-'.auth()->id(), auth()->user()->snippets()->paginate(12));
        }

        return Cache::get('snippets-'.auth()->id());
    }
}
