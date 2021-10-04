<?php

use App\Repositories\RepositoryInterface;

class BlogsRepository implements RepositoryInterface {

    public function getCollection()
    {
        return auth()->user()->blogs()->paginate(12);
    }
}