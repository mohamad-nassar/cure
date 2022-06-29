<?php

namespace App\Http\Controllers;

use App\Models\Home_service;
use App\Models\Home_slider;
use App\Models\Icon;
use App\Models\outpatient_clinics;
use App\Models\Who;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function page()
    {
        $slider=Home_slider::all();
        $who=Who::first();
        $icons=Icon::all();
        $services=Home_service::all();
        $outpatient=outpatient_clinics::first();
        return view('CMS.home',compact('slider','who','icons','services','outpatient'));
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

    public function addnewservice(Request $request)
    {
        $service=new Home_service();
        $service->title=$request->input('title');
        $service->text=$request->input('text');
        $service->icon=$request->input('icon');
        $service->save();
        return back()->with('err','New service has been added.');
    }
    public function updateservice(Request $request,$id)
    {
        $service=Home_service::find($id);
        $service->title=$request->input('title');
        $service->text=$request->input('text');
        $service->icon=$request->input('icon');
        $service->update();
        return back()->with('err','Service has been updated.');
    }
    public function statusservice($id,$status)
    {
        $service=Home_service::find($id);
        $service->status=$status;
        $service->update();
        return back()->with('err','Service status has been updated.');
    }
    public function deleteservice($id)
    {
        $service=Home_service::find($id);
        $service->delete();
        return back()->with('err','Service has been deleted.');
    }
    public function updateoutpatient(Request $request)
    {
        $outpatient=outpatient_clinics::first();
        $outpatient->patient=$request->input('patient');
        $outpatient->doctor=$request->input('doctor');
        $outpatient->room=$request->input('room');
        $outpatient->update();
        return back()->with('err','Outpatient has been updated');
    }
}
