<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class TemporaryUserModel extends Model
{
    public $table = 'temporary_user';
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->uuid = Str::random(9);
        });
    }
}
