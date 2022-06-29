<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\visitors;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{


    public function index()
    {
        if(count(User::where('level','Superadmin')->get())>0) return view('auth.login');
        else return view('auth.register');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
    [
        'email.required'=>'Please enter your email address',
        'email.required'=>'Please enter a valid email address',
        'password.required'=>'Please enter your password'
    ]
    );

        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            if(Auth::user()->status=='Activated') return redirect(route('dashboard'))->withSuccess('Signed in');
            else Auth::logout(); return back()->withErrors('Sorry but you are blocked');
        }

        else{
        return back()->withErrors('Login details are not valid');
    }
}

public function customRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ],
    [
        'email.required'=>'Please enter email address',
        'email.email'=>'Please enter a valid email address',
        'name.required'=>'Please enter username',
        'password.required'=>'Please enter your password'
    ]
    );

    User::create([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'level'=>'Superadmin',
        'status'=>'Activated',
        'password'=>Hash::make($request->input('password'))
    ]);
        return redirect(route('login'));
}

    public function dashboard()
    {
        $month = [date('F', strtotime('-5 month')),date('F', strtotime('-4 month')),date('F', strtotime('-3 month')),date('F', strtotime('-2 month')),date('F', strtotime('-1 month')),date("F")];
        $user = [];
        $app=[];
        foreach ($month as $key => $value) {
            $user[] = visitors::where(\Illuminate\Support\Facades\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
            $app[]= Appointment::where(\Illuminate\Support\Facades\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
        }
    	return view('Superadmin.dashboard')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK))->with('appointment',json_encode($app,JSON_NUMERIC_CHECK));
    }

    public function signOut() {
        Auth::logout();
        return Redirect('login');
    }
}
