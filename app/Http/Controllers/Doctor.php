<?php

namespace App\Http\Controllers;

use App\Models\Doctor as ModelsDoctor;
use Illuminate\Http\Request;

class Doctor extends Controller
{
    public function page()
    {
        $doctors=ModelsDoctor::all();
        return view('CMS.doctor',compact('doctors'));
    }
    public function addnewdoctor(Request $request)
    {
        $doctor=new ModelsDoctor();
        $doctor->name=$request->input('name');
        $doctor->caption=$request->input('caption');
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/', $fileName);
            $uploadFile = 'upload/' . $fileName;
            $image=$uploadFile;
            $doctor->image=$image;
        }
        $doctor->save();
        return back()->with('err','New Doctor has been added.');
    }
    public function updatedoctor(Request $request,$id)
    {
        $doctor=ModelsDoctor::find($id);
        $doctor->name=$request->input('name');
        $doctor->caption=$request->input('caption');
        if($request->hasFile('image'))
        {
            if($doctor->image) unlink($doctor->image);
            $image = $request->file('image');
            $fileName = time().rand(1000,50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/', $fileName);
            $uploadFile = 'upload/' . $fileName;
            $image=$uploadFile;
            $doctor->image=$image;
        }
        $doctor->update();
        return back()->with('err','Doctor has been updated.');
    }
    public function statusdoctor($id,$status)
    {
        $doctor=ModelsDoctor::find($id);
        $doctor->status=$status;
        $doctor->update();
        return back()->with('err','Doctor status has been updated.');
    }
    public function deletedoctor($id)
    {
        $doctor=ModelsDoctor::find($id);
        if($doctor->image) unlink($doctor->image);
        $doctor->delete();
        return back()->with('err','Doctor status has been deleted.');
    }
}
