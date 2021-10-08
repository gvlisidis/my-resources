<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class RepositoryStrategy
{
    public array $resources = [
        'articles' => ArticlesRepository::class,
        'blogs' => BlogsRepository::class,
        'snippets' => SnippetsRepository::class,
        'videos' => VideosRepository::class,
        'packages' => PackagesRepository::class,
        'books' => BooksRepository::class,
    ];


    public function getClass(string $uri)
    {
        $resourceString = $uri;
        if (array_key_exists($resourceString, $this->resources)) {
            return new $this->resources[$resourceString];
        }

        throw new ModelNotFoundException();
    }
}
