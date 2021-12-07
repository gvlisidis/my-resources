<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Tags\HasTags;
use \App\Traits\HasTags as HasLivewireTags;

class Article extends Model
{
    use HasFactory, HasTags, HasLivewireTags;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        static::saving(function () {
            Cache::forget('articles-' . auth()->id());
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
