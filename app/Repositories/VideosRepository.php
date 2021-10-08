<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class VideosRepository implements RepositoryInterface
{

    public function all()
    {
        if (!Cache::has('videos-'.auth()->id())) {
            Cache::put('videos-'.auth()->id(), auth()->user()->videos()->paginate(12));
        }

        return Cache::get('videos-'.auth()->id());
    }
}
