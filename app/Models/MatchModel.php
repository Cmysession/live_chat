<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class MatchModel extends Model
{
    public $table = 'match';
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::random(9);
        });
        static::saving(function () {

        });
    }
}
