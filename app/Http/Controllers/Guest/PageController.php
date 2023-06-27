<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $trains = Train::orderBy('departure_time')->get();

        return view('home', ['trains' => $trains]);
    }
}
