<?php

namespace App\Http\Controllers;

use App\Models\Equipement as ModelsEquipement;
use Illuminate\Http\Request;

class Equipement extends Controller
{
    public function page()
    {
        $image=ModelsEquipement::all();
        return view('CMS.equipement',compact('image'));
    }
    public function equipementuploadimage(Request $request)
    {
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $key) {
                $image=new ModelsEquipement();
                    $file=$key;
                    $fileName = time().rand(1000,50000) . '.' . $file->getClientOriginalExtension();
                    $file->move('upload/', $fileName);
                    $uploadFile = 'upload/' . $fileName;
                    $image->image=$uploadFile;
                    $image->save();
            }
            return back()->with('err', 'Images has been updated successfuly');
        }
        return back();
    }
    public function equipementdeleteimage($id)
    {
        $image=ModelsEquipement::find($id);
        unlink($image->image);
        $image->delete();
        return response()->json(['success'=>'success']);
    }
}
