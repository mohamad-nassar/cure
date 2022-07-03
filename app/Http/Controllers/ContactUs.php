<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUs extends Controller
{
    public function page()
    {
        $contact=file_get_contents(public_path() ."/pages/contactus.json");
        $opening=file_get_contents(public_path() ."/pages/opening.json");
        return view('CMS.contact',compact('contact','opening'));
    }
    public function contactpdate(Request $request)
    {
        $contact=json_decode(file_get_contents(public_path() ."/pages/contactus.json"));
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
            'facebook'=>$request->input('facebook'),
            'instagram'=>$request->input('instagram'),
            'whatsapp'=>$request->input('whatsapp'),
        );
        $contactus=$data;
        $contactus=json_encode($contactus);
        file_put_contents((public_path() ."/pages/contactus.json"),$contactus);
        $msg="Contact us updated successfully";
        return response()->json(['status'=>200,'msg'=>$msg]);
    }
    public function openingupdate(Request $request)
    {
        $data=array();
        for($i=1;$i<=$request->input('count');$i++)
        {
            if($request->input('day'.$i)!=null) $data += [$request->input('day'.$i)=>$request->input('hour'.$i)];
        }
        $data=json_encode($data);
        file_put_contents((public_path() ."/pages/opening.json"),$data);
        $msg="Opening Hours updated successfully";
        return response()->json(['status'=>200,'msg'=>$msg]);
    }
}
