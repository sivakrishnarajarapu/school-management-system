<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ViewProfile()
    {
        // dd("Hello");
        $id = Auth::user()->id;
        // dd($id);
        $user = User::find(Auth::user()->id);
        return view('backend.user.view_profile',compact('user'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.edit_profile',compact('editData'));
    }

    public function ProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);

    }

    public function PasswordChange()
    {
        return view('backend.user.password_change');
    }

    public function PasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed' 
        ]);

        $hasedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hasedPassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }

    }


}
