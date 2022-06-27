<?php

namespace App\Http\Controllers;

use App\Models\Home_slider;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function page()
    {
        $slider=Home_slider::all();
        return view('CMS.home',compact('slider'));
    }

    public function addslider(Request $request)
    {
        $slider=new Home_slider();
        $slider->title=$request->input('title');
        $slider->text=$request->input('text');
        if($request->hasFile('image'))
        {
         $image = $request->file('image');
         $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
         $image->move('upload/', $fileName);
         $uploadFile = 'upload/' . $fileName;
         $image=$uploadFile;
         $slider->image=$image;
        }
        $slider->save();
        return back()->with('err','Slider Has Been Added.');
    }
}
