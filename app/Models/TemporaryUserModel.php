<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Cache;

class TemporaryUserModel extends Model
{
    public $table = 'temporary_user';
    protected $fillable = ['uuid', 'live_room_id', 'fd', 'username', 'status', 'remarks', 'ip', 'on_line', 'sort', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
            Cache::forget('ban_users');
            Cache::remember('ban_users', 600, function () use ($model) {
                return TemporaryUserModel::where('status', 2)->pluck('fd','uuid')->toArray();
            });
        });
    }
    public function room()
    {
        return $this->hasOne(LiveRoomModel::class, 'uuid', 'live_room_id');
    }
}
