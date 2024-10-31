<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class LiveRoomModel extends Model
{
    public $table = 'live_room';
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->uuid = Str::random(8);
        });
    }
}
