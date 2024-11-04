<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class TemporaryUserModel extends Model
{
    public $table = 'temporary_user';
    protected $fillable = ['uuid', 'live_room_id', 'fd', 'username', 'status', 'remarks', 'sort', 'updated_at'];

    public function room()
    {
        return $this->hasOne(LiveRoomModel::class, 'uuid', 'live_room_id');
    }
}
