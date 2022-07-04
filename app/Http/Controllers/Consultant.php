<?php

namespace App\Http\Controllers;

use App\Models\Consultant as ModelsConsultant;
use Illuminate\Http\Request;

class Consultant extends Controller
{
    public function page()
    {
        $consult=ModelsConsultant::first();
        return view('CMS.consultant',compact('consult'));
    }
    public function update(Request $request)
    {
        $consult=ModelsConsultant::first();
        $consult->doctor=$request->input('doctor');
        $consult->consultant=$request->input('consult');
        $consult->update();
        return back()->with('err','Consultant has been updated.');
    }
}
