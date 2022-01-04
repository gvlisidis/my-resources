<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Package;
use App\Models\Snippet;
use App\Models\Video;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function showResources(Tag $tag)
    {
        return view('resources/tags')->with([
            'searchResults' => [
                'Articles' => Article::withAllTags([$tag->name])->get(),
                'Snippets' => Snippet::withAllTags([$tag->name])->get(),
                'Blogs' => Blog::withAllTags([$tag->name])->get(),
                'Packages' => Package::withAllTags([$tag->name])->get(),
                'Books' => Book::withAllTags([$tag->name])->get(),
                'Videos' => Video::withAllTags([$tag->name])->get(),
            ],
            'tagName' => $tag->name,
            'searchTerm' => null,
            'model' => null,
        ]);
    }
}
