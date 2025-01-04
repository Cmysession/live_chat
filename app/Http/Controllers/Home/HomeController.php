<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, $area)
    {
//        echo $area;
        return view('home.index');
    }

    public function live(Request $request, $area)
    {
        return view('home.live');
    }

    public function contest(Request $request, $area)
    {
        return view('home.contest');
    }
}
