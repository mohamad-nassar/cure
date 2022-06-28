<?php

namespace App\Http\Controllers;

use App\Mail\appointupd;
use App\Models\Appointment as ModelsAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Appointment extends Controller
{
    public function page()
    {
        $appointment=ModelsAppointment::with('departments')->with('doctors')->get();
        return view('CMS.appointment',compact('appointment'));
    }
    public function updateappointment(Request $request, $id)
    {
        $appointment=ModelsAppointment::find($id);
        $appointment->date=$request->input('date');
        $appointment->update();
        $data=[
            'date'=>$request->input('date')
        ];
        Mail::to($appointment->email)->send(new appointupd($data));
        return back()->with('err','Appointment has been updated.');
    }
}
