<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Image;

class ChangePass extends Controller
{
    public function ChangePassword()
    {
        return view('admin.body.changePass');
    }
    public function UpdatePassword(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $noti = array(
                'message'=> "Update Password thành công",
                'alert-type'=>'success'
            );
            return redirect()->route('login')->with($noti);
        }else{
            $noti = array(
                'message'=> "Update Password 0 thành công",
                'alert-type'=>'success'
            );
            return redirect()->back()->with($noti);
        }
    }
    public function PUpdate()
    {
        if(Auth::user()){
            $user =User::find(Auth::user()->id);
            if($user){

                return view('admin.body.update_profile',compact('user'));
            }
        }
    }
    public function UpdateProfile(Request $request)
    {
         $user = User::find(Auth::user()->id);
         $old_image = $request->old_image;
         $old_image = substr($old_image,9);
         similar_text("Hello World","Hello Hello",$percent);
         if($user){
             $user->name = $request['user_name'];
             $user->email = $request['user_email'];
             $avatar = $request->file('user_avatar');
             if($avatar){
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($avatar->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;
                $up_location = 'image/avatar/';
                $last_img = $up_location.$img_name;
                $avatar->move($up_location,$img_name);
                if (strpos($old_image, 'https://ui-avatars.com') !== 0) {
                    unlink($old_image);
                }
                $user->profile_photo_path = $last_img;
             }
             $user->save();
             $noti = array(
                'message'=> "Update Profile thành công",
                'alert-type'=>'success'
            );
             return Redirect()->back()->with($noti);
         }
         else {
            $noti = array(
                'message'=> "Update Profile 0 thành công",
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($noti);
         }
    }
}
