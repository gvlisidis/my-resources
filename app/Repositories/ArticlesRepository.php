<?php

use App\Repositories\RepositoryInterface;

class ArticlesRepository implements RepositoryInterface {

    public function getCollection()
    {
        return auth()->user()->articles()->paginate(12);
    }
}