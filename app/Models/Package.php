<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Package extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        static::saving(function () {
            Cache::forget('packages-' . auth()->id());
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
