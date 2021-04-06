<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function PHPUnit\Framework\returnSelf;

class StudentGroupController extends Controller
{
    public function StudentGroupView()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.user.group.view_group',$data);
    }

    public function StudentGroupAdd()
    {
        return view('backend.user.group.add_group');
    }

    public function StudentGroupStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'student group created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $data = StudentGroup::find($id);
        return view('backend.user.group.edit_group',compact('data'));
    }

    public function StudentGroupUpdate(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = StudentGroup::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'student group updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        $data = StudentGroup::find($id);
        $data->delete();
        $notification = array(
            'message' => 'student group deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
