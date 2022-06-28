<?php

namespace App\Http\Controllers;

use App\Models\Department as ModelsDepartment;
use App\Models\Icon;
use Illuminate\Http\Request;

class Department extends Controller
{
    public function page()
    {
        $departments=ModelsDepartment::all();
        $icons=Icon::all();
        return view('CMS.department',compact('departments','icons'));
    }
    public function addnewdepartment(Request $request)
    {
        $department=new ModelsDepartment();
        $department->title=$request->input('title');
        $department->icon=$request->input('icon');
        $department->text=$request->input('caption');
        $department->save();
        return back()->with('err','New Department Has Been Added.');
    }
    public function updatedepartment(Request $request,$id)
    {
        $department=ModelsDepartment::find($id);
        $department->title=$request->input('title');
        $department->icon=$request->input('icon');
        $department->text=$request->input('caption');
        $department->update();
        return back()->with('err','Department Has Been Updated.');
    }
    public function deletedepartment(Request $request,$id)
    {
        $department=ModelsDepartment::find($id);
        $department->delete();
        return back()->with('err','Department Has Been Deleted.');
    }
    public function statusdepartment($id,$status)
    {
        $department=ModelsDepartment::find($id);
        $department->status=$status;
        $department->update();
        return back()->with('err','Department Has Been Updated.');
    }
}
