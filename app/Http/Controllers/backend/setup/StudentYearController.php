<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentClass;

class StudentYearController extends Controller
{
    public function StudentYearView()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.user.year.view_year',$data);
    }

    public function StudentYearAdd()
    {
        return view('backend.user.year.add_year');
    }

    public function StudentYearStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);
        
        $data = New StudentYear();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Year Created Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.user.year.edit_year',compact('editData'));
    }

    public function StudentYearUpdate(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = StudentYear::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Year Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);

    }

    public function StudentYearDelete($id)
    {
        $data = StudentYear::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Year Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
