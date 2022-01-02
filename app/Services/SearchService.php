<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Package;
use App\Models\Snippet;
use App\Models\Video;
use Spatie\Searchable\Search;

class SearchService
{
    protected array $data;
    protected Search $search;

    private array $models = [
        'article' => Article::class,
        'blog' => Blog::class,
        'snippet' => Snippet::class,
        'book' => Book::class,
        'package' => Package::class,
        'video' => Video::class,
    ];

    public function __construct(array $data)
    {
        $this->search = new Search();
        $this->data = $data;
    }

    public function search()
    {
        if ($model = $this->data['model']) {
            return $this->search
                ->registerModel($this->models[$model], $this->models[$model]::SEARCH_FIELDS)
                ->search($this->data['searchTerm']);
        }

        return $this->search
            ->registerModel(Article::class, Article::SEARCH_FIELDS)
            ->registerModel(Blog::class, Blog::SEARCH_FIELDS)
            ->registerModel(Snippet::class, Snippet::SEARCH_FIELDS)
            ->registerModel(Package::class, Package::SEARCH_FIELDS)
            ->registerModel(Book::class, Book::SEARCH_FIELDS)
            ->registerModel(Video::class, Video::SEARCH_FIELDS)
            ->search($this->data['searchTerm']);
    }
}
