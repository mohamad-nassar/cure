<?php

namespace App\Http\Controllers;

use App\Models\Service as ModelsService;
use Illuminate\Http\Request;

class Service extends Controller
{
    public function page()
    {
        $services=ModelsService::all();
        return view('CMS.services',compact('services'));
    }
    public function addnewservice(Request $request)
    {
        $service=new ModelsService();
        $service->title=$request->input('title');
        $service->caption=$request->input('caption');
        if($request->hasFile('image'))
        {
         $image = $request->file('image');
         $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
         $image->move('upload/', $fileName);
         $uploadFile = 'upload/' . $fileName;
         $image=$uploadFile;
         $service->image=$image;
        }
        $service->description=$request->input('description');
        $service->save();
        return back()->with('err','Service added successfully');
    }
    public function updateservice(Request $request,$id)
    {
        $service=ModelsService::find($id);
        $service->title=$request->input('title');
        $service->caption=$request->input('caption');
        if($request->hasFile('image'))
        {
         if($service->image) unlink($service->image);
         $image = $request->file('image');
         $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
         $image->move('upload/', $fileName);
         $uploadFile = 'upload/' . $fileName;
         $image=$uploadFile;
         $service->image=$image;
        }
        $service->description=$request->input('description');
        $service->update();
        return back()->with('err','Service updated successfully');
    }
    public function deleteservice($id)
    {
        $service=ModelsService::find($id);
        if($service->image) unlink($service->image);
        $service->delete();
        return back()->with('err','Service deleted successfully');
    }
    public function statusservice($id,$status)
    {
        $service=ModelsService::find($id);
        $service->status=$status;
        $service->update();
        return back()->with('err','Service status updated successfully');
    }
}
