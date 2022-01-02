<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Tags\HasTags;
use \App\Traits\HasTags as HasLivewireTags;

class Package extends Model implements Searchable
{
    use HasFactory, HasTags, HasLivewireTags;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    const SEARCH_FIELDS = ['title'];

    public static function boot()
    {
        parent::boot();
        static::saving(function () {
            Cache::forget('packages-' . auth()->id());
        });
    }

    public function getSearchResult(): SearchResult
    {
        $url = '';

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
