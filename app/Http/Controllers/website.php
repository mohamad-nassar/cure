<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class website extends Controller
{
    public function  index()
    {
        return view('website.index');
    }
    public function about()
    {
        return view('website.about');
    }
    public function appointment()
    {
        return view('website.appointment');
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function department()
    {
        return view('website.department');
    }
    public function fordoctor()
    {
        return view('website.for-doctor');
    }
    public function hospitalequipment()
    {
        return view('website.hospital-equipment');
    }
    public function meetdr()
    {
        return view('website.meetdr');
    }
    public function services()
    {
        return view('website.services');
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
