<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Auth;

class MainAdminController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.profile.view_profile',compact('adminData'));
    }

    public function editAdmin(){
        $adminData = Admin::find(1);
        return view('admin.profile.edit_profile',compact('adminData'));
    }

    public function adminStore(Request $request){
        $validataData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->profile_photo_path = $request->profile_photo_path;
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/adminimage/'.$data->profile_photo_path));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/adminimage'),$filename);
            $data['profile_photo_path']= $filename;
        }
        $data->save();

        //toastr
        $notification = array(
            'message' => 'Profile update successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin-profile')->with($notification);

    }

    public function passAdminChange(){
        return view('admin.profile.pass_change');
    }

    public function adminPassUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            //tostr
            $notification = array(
                'message' => 'Password update successfully!',
                'alert-type' => 'info'
            );

            return redirect()->route('logout')->with($notification);

        }else{
            $notification = array(
                'message' => 'wofs! password not updated',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }


}
