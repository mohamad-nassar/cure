<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class website extends Controller
{
    public function homepage()
    {
        $video=topvideo::first();
        return view('website.home',compact('video'));
    }
}
