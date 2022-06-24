<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs as about;
class AboutUs extends Controller
{
    public function page()
    {
        $topimg=file_get_contents(public_path() ."/pages/aboutus.json");
        $ourvision=file_get_contents(public_path() ."/pages/ourvision.json");
        $ourmission=file_get_contents(public_path() ."/pages/ourmission.json");
        $allvalues=file_get_contents(public_path() ."/pages/values.json");
        return view('CMS.about',compact('topimg','ourvision','ourmission','allvalues'));
    }
    public function aboutupdate(Request $request)
    {
        $about=json_decode(file_get_contents(public_path() ."/pages/aboutus.json"));
        $image=$about->image;
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
        );
        $aboutus=$data;
        $aboutus=json_encode($aboutus);
        file_put_contents((public_path() ."/pages/aboutus.json"),$aboutus);
        return response()->json(['status'=>200,'msg'=>'Top Image has been updated.']);
    }

    public function visionupdate(Request $request)
    {
        $about=json_decode(file_get_contents(public_path() ."/pages/ourvision.json"));
        $image=$about->image;
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
            'description'=>$request->input('description'),
        );
        $aboutus=$data;
        $aboutus=json_encode($aboutus);
        file_put_contents((public_path() ."/pages/ourvision.json"),$aboutus);
        return response()->json(['status'=>200,'msg'=>'Our Vision has been updated.']);
    }

    public function missionupdate(Request $request)
    {
        $about=json_decode(file_get_contents(public_path() ."/pages/ourmission.json"));
        $image=$about->image;
        if($request->hasFile('image'))
        {
         $image = $request->file('image');
         $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
         $image->move('upload/', $fileName);
         $uploadFile = 'upload/' . $fileName;
         $image=$uploadFile;
        }
        $values=array();
        for($i=1;$i<=$request->input('count');$i++)
        {
            if($request->input('text'.$i)!=null) $values += [$request->input('text'.$i)=>""];
        }
        $data=array(
            'image'=>$image,
            'description'=>$request->input('description'),
            'values'=>$values
        );
        $aboutus=$data;
        $aboutus=json_encode($aboutus);
        file_put_contents((public_path() ."/pages/ourmission.json"),$aboutus);
        return response()->json(['status'=>200,'msg'=>'Our Mission has been updated.']);
    }

    public function valuesupdate(Request $request)
    {
        $about=json_decode(file_get_contents(public_path() ."/pages/values.json"));
        $image=$about->image;
        if($request->hasFile('image'))
        {
         $image = $request->file('image');
         $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
         $image->move('upload/', $fileName);
         $uploadFile = 'upload/' . $fileName;
         $image=$uploadFile;
        }
        $values=array();
        for($i=1;$i<=$request->input('count');$i++)
        {
            if($request->input('text'.$i)!=null) $values += [$request->input('text'.$i)=>""];
        }
        $data=array(
            'image'=>$image,
            'description'=>$request->input('description'),
            'values'=>$values
        );
        $aboutus=$data;
        $aboutus=json_encode($aboutus);
        file_put_contents((public_path() ."/pages/values.json"),$aboutus);
        return response()->json(['status'=>200,'msg'=>'Values has been updated.']);
    }
}
