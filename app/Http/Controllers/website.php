<?php

namespace App\Http\Controllers;

use App\Mail\appoint;
use App\Mail\contact;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Equipement;
use App\Models\Home_service;
use App\Models\Home_slider;
use App\Models\Service;
use App\Models\Who;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class website extends Controller
{
    public function  index()
    {
        $slider=Home_slider::where('status',1)->get();
        $opening=json_decode(file_get_contents(public_path() ."/pages/opening.json"));
        $departments=Department::where('status',1)->get();
        $who=Who::first();
        $services=Home_service::where('status',1)->get();
        return view('website.index',compact('slider','opening','departments','who','services'));
    }
    public function about()
    {
        $topimg=file_get_contents(public_path() ."/pages/aboutus.json");
        $ourvision=file_get_contents(public_path() ."/pages/ourvision.json");
        $ourmission=file_get_contents(public_path() ."/pages/ourmission.json");
        $allvalues=file_get_contents(public_path() ."/pages/values.json");
        return view('website.about',compact('topimg','ourvision','ourmission','allvalues'));
    }
    public function appointment()
    {
        $departments=Department::where('status',1)->get();
        $doctors=Doctor::where('status',1)->get();
        return view('website.appointment',compact('departments','doctors'));
    }
    public function sendappointment(Request $request)
    {
        $app=new Appointment();
        $app->department=$request->input('department');
        $app->doctor=$request->input('doctor');
        $app->new_old=$request->input('patient');
        $app->date=$request->input('date');
        $app->name=$request->input('name');
        $app->email=$request->input('email');
        $app->phone=$request->input('phone');
        $app->message=$request->input('message');
        $app->save();
        $departments=Department::find($request->input('department'));
        $doctors=Doctor::find($request->input('doctor'));
        $data=[
            'department'=>$departments->title,
            'doctor'=>$doctors->name,
            'status'=>$request->input('patient'),
            'date'=>$request->input('date'),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'msg'=>$request->input('message'),
        ];
        Mail::to('mohamadnassar13.mn@gmail.com')->send(new appoint($data));
        return back()->with('err','Appointment has been sent.');
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function sendcontact(Request $request)
    {
        $data=[
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'subject'=>$request->input('subject'),
            'msg'=>$request->input('msg')
        ];
        // Mail::to('info@cure-hospital.com')->send(new contact($data));
        Mail::to('mohamadnassar13.mn@gmail.com')->send(new contact($data));
        return back()->with('err','Your message has been submitted.');
    }
    public function department()
    {
        $departments=Department::where('status',1)->get();
        $opening=json_decode(file_get_contents(public_path() ."/pages/opening.json"));
        return view('website.department',compact('departments','opening'));
    }
    public function fordoctor()
    {
        return view('website.for-doctor');
    }
    public function hospitalequipment()
    {
        $images=Equipement::all();
        return view('website.hospital-equipment',compact('images'));
    }
    public function meetdr()
    {
        $doctors=Doctor::where('status',1)->get();
        return view('website.meetdr',compact('doctors'));
    }
    public function services()
    {
        $services=Service::where('status','1')->get();
        return view('website.services',compact('services'));
    }
    public function timetable()
    {
        return view('website.timetable');
    }
    public function telemedicine()
    {
        return view('website.telemedicine');
    }
    public function medical()
    {
        return view('website.medical');
    }
}
