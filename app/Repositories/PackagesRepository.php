<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class PackagesRepository implements RepositoryInterface
{

    public function all()
    {
        if (!Cache::has('packages-'.auth()->id())) {
            Cache::put('packages-'.auth()->id(), auth()->user()->packages()->paginate(12));
        }

        return Cache::get('packages-'.auth()->id());
    }
}
