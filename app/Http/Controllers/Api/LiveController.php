<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class LiveController extends Controller
{
    public function liveRoom()
    {
        return json_encode(['hello'=>'goods']);
    }
}
