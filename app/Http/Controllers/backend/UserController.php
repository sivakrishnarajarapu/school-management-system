<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        /* Old elaquent ORM */

        // $allData = User::all();  
        // return view('backend.user.view_user',compact('allData'));

        /* Data getting from arry object */

        $data['allData'] = User::all();
        return view('backend.user.view_user',$data);
    }

    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);

        $data = new User();
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }


    public function UserEdit($id)
    {
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);

    }

    public function UserDelete($id)
    {
        $data = User::find($id);
        $data->delete();

        $notification = array(
            'message' => 'User deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);

    }


}
