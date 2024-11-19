<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class MatchModel extends Model
{
    public $table = 'match';

    protected $casts = [
        'live' => 'json',
    ];


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::random(9);
        });
        static::saving(function () {
            $areaArray = config('live_area');
            foreach ($areaArray as $key => $value) {
                Cache::forget($key . '_room');
            }
            Cache::forget('room');
        });
    }
}


