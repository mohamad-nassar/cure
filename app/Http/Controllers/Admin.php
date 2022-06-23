<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function sendtoadmin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);
        return "Hello";
    }
}
