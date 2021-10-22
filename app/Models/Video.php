<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Tags\HasTags;

class Video extends Model
{
    use HasFactory, HasTags;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        static::saving(function () {
            Cache::forget('videos-' . auth()->id());
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
