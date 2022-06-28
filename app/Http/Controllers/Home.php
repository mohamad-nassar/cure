<?php

namespace App\Http\Controllers;

use App\Models\Home_slider;
use App\Models\Who;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function page()
    {
        $slider=Home_slider::all();
        $who=Who::first();
        return view('CMS.home',compact('slider','who'));
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

    public function updateslider(Request $request,$id)
    {
        $slider=Home_slider::find($id);
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
        $slider->update();
        return back()->with('err','Slider Has Been Updated.');
    }

    public function deleteslider($id)
    {
        $slider=Home_slider::find($id);
        unlink($slider->image);
        $slider->delete();
        return back()->with('err','Slider Has Been Deleted.');
    }

    public function statusslider($id,$status)
    {
        $slider=Home_slider::find($id);
        $slider->status=$status;
        $slider->update();
        return back()->with('err','Slider status has been updated.');
    }

    public function updatewho(Request $request)
    {
        $who=Who::first();
        $who->description=$request->input('description');
        if($request->hasFile('image'))
        {
         $image = $request->file('image');
         $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
         $image->move('upload/', $fileName);
         $uploadFile = 'upload/' . $fileName;
         $image=$uploadFile;
         $who->image=$image;
        }
        $who->update();
        return back()->with('err','Who Are We has been updated.');
    }
}
