<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentClassController extends Controller
{
    public function StudentClassView()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.user.setup.view_class',$data);
    }

    public function StudentClassAdd()
    {
        return view('backend.user.setup.add_class');
    }

    public function StudentClassStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Class Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit($id)
    {
        // dd("hi");
        $data = StudentClass::find($id);
        // dd($data);
        return view('backend.user.setup.edit_class',compact('data'));
    }

    public function StudentClassUpdate(Request $request,$id)
    {
        $data = StudentClass::find($id);
        // dd($data);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Class Updated Successfully!',
            'alert-type' => 'success'
        );
       
        return redirect()->route('student.class.view')->with($notification);

    }

    public function StudentClassDelete($id)
    {
        // dd("hi");
        $data = StudentClass::find($id);
        // dd($data);
        $data->delete();

        $notification = array(
            'message' => 'Class Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



}
