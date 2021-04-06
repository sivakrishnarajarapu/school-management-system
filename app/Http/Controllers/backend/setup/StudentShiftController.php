<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentShiftController extends Controller
{
    public function StudentShiftView()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.user.shift.view_shift',$data);
    }

    public function StudentShiftAdd()
    {
        return view('backend.user.shift.add_shift');
    }

    public function StudentShiftStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'student shift created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);


    }

    public function StudentShiftEdit($id)
    {
        $data = StudentShift::find($id);
        return view('backend.user.shift.edit_shift',compact('data'));
    }

    public function StudentShiftUpdate(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = StudentShift::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'student shift updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id)
    {
        $data = StudentShift::find($id);
        $data->delete();
        $notification = array(
            'message' => 'student shift deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
