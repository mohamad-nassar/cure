<?php

namespace App\Http\Controllers;

use App\Mail\invitation;
use App\Models\invit;
use App\Models\User;
use App\Models\recycle_bin;
use App\Models\testing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Superadmin extends Controller
{
    public function admins()
    {
        if(Auth::user()->level=='Superadmin'){
        $users=User::where('level','Admin')->get();
        return view('Superadmin.admins',compact('users'));
    }
    else return redirect('/dashboard');
}
    public function invitation(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:users,email|email'
        ],
        [
            'email.required'=>'Please enter email address',
            'email.email'=>'Please enter a valid email address',
            'email.unique'=>'Email already in use!',
        ]);
        $request->validate([
            'email'=>'unique:invit,email'
        ],
        [
            'email.unique'=>'Invitation already sent!'
        ]);

        $session=rand(1000000000000,1000000000000000);
        $invit=new invit();
        $invit->email=$request->input('email');
        $invit->invit=$session;
        $invit->save();
        $message=[
          'session'=>$session
        ];
        Mail::to($request->input('email'))->send(new invitation($message));
        return back()->with('err','Email has been sent!');
    }
    public function acceptinvitation($session)
    {
        $flag=0;
       foreach(invit::all() as $key)
       {
           if($session==$key->invit)
           {
               $flag=1;
               break;
           }
           else 
           {
               $flag=0;
           }
       }
       if($flag==0) return view('errors.notexist');
       else{ $invit=invit::where('invit',$session)->first(); return view('Superadmin.admin',compact('session','invit'));
    }
}
    public function register(Request $request,$session)
    {
        $invit=invit::where('invit',$session)->first();
        $request->validate([
            'name'=>'required',
            'password'=>'required|min:1'
        ],
    [
        'name.required'=>'Please enter your username.',
        'password.required'=>'Please enter your password.',
        'password.min'=>'Your password must be at least 8 charachters.',
    ]);
        User::create([
            'name'=>$request->input('name'),
            'email'=>$invit->email,
            'password'=>Hash::make($request->input('password')),
            'level'=>'Admin',
            'status'=>'Activated',
        ]);
        invit::where('invit',$session)->delete();
    }
    public function changestatus($status,$id)
    {
        $user=User::find($id);
        $user->status=$status;
        $user->update();
        return back()->with('err','Status has been changed successfully.');
    }

}
