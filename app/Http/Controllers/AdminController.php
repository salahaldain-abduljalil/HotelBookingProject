<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admindashboard(){
        return view('admin.body.index');
    }

    public function adminlogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function adminlogin(){

        return view('admin.admin_login');
    }

    public function adminprofile(){

        $id = Auth::user()->id;
        $profiledata = User::find($id);
        return view('admin.admin_profile',compact('profiledata'));
    }


   //to update the Data of admin.

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            //لحذف الصورة السابقة من المجلد عند تحديث الصورة
            @unlink(public_path('uploads/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'),$filename);
            $data['photo'] = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


    //using on header inside setting navbar.
    public function AdminChangePassword(){

        $id = Auth::user()->id;
        $profiledata = User::find($id);
        return view('admin.admin_change_password',compact('profiledata'));

    }// End Method

    public function AdminPasswordUpdate(Request $request){

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, auth::user()->password)){

            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );

            return back()->with($notification);

        }

        /// Update The New Password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }// End Method
}
