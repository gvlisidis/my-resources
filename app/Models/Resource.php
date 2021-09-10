<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resource extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    const ARTICLE = 1;
    const SNIPPET = 2;
    const VIDEO = 3;
    const PACKAGE = 4;
    const BLOG = 5;

    const RESOURCE_TYPES = [
       self::ARTICLE => 'Article',
       self::SNIPPET => 'Snippet',
       self::VIDEO => 'Video',
       self::PACKAGE => 'Package',
       self::BLOG => 'Blog',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeArticle(Builder $query): Builder
    {
        return $query->whereType(self::ARTICLE);
    }

    public function scopeSnippet(Builder $query): Builder
    {
        return $query->whereType(self::SNIPPET);
    }

    public function scopeVideo(Builder $query): Builder
    {
        return $query->whereType(self::VIDEO);
    }

    public function scopePackage(Builder $query): Builder
    {
        return $query->whereType(self::PACKAGE);
    }

    public function scopeBlog(Builder $query): Builder
    {
        return $query->whereType(self::BLOG);
    }
}
