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
        $topimg=file_get_contents(public_path() ."/pages/aboutus.json");
        $ourvision=file_get_contents(public_path() ."/pages/ourvision.json");
        $ourmission=file_get_contents(public_path() ."/pages/ourmission.json");
        $allvalues=file_get_contents(public_path() ."/pages/values.json");
        return view('website.about',compact('topimg','ourvision','ourmission','allvalues'));
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
