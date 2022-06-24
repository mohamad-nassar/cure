<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function page()
    {
        return view('CMS.home');
    }
}
