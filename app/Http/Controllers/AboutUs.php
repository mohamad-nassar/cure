<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs as about;
class AboutUs extends Controller
{
    public function page()
    {
        $about=file_get_contents(public_path() ."\pages\aboutus.json");
        return view('CMS.about',compact('about'));
    }
    public function aboutupdate(Request $request)
    {
        $about=json_decode(file_get_contents(public_path() ."\pages\aboutus.json"));
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
            'caption'=>$request->input('caption'),
            'description'=>$request->input('description'),
        );
        $aboutus=$data;
        $aboutus=json_encode($aboutus);
        file_put_contents((public_path() ."\pages\aboutus.json"),$aboutus);
        return back()->with('err','About us updated successfully');
    }
}
