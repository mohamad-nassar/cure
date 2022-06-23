<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUs extends Controller
{
    public function page()
    {
        $contact=file_get_contents(public_path() ."\pages\contactus.json");
        return view('CMS.contact',compact('contact'));
    }
    public function contactpdate(Request $request)
    {
        $contact=json_decode(file_get_contents(public_path() ."\pages\contactus.json"));
        $image=$contact->image;
        if($request->hasFile('image'))
        {
         $image = $request->file('image');
         $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
         $image->move('upload/', $fileName);
         $uploadFile = 'upload/' . $fileName;
         $image=$uploadFile;
        }
        $data=array(
            'image'=>$image,
            'location'=>$request->input('location'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
        );
        $contactus=$data;
        $contactus=json_encode($contactus);
        file_put_contents((public_path() ."\pages\contactus.json"),$contactus);
        // return back()->with('err','Contact us updated successfully');
        $msg="Contact us updated successfully";
        return response()->json(['status'=>200,'msg'=>$msg]);
    }
}
