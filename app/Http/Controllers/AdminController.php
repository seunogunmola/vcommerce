<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        // SET PAGE TITLE 
        $title = "Admin Dashboard";
        // RETURN VIEW WITH TITLE 
        return view('admin.dashboard',compact('title'));
    }

    //SHOW ADMIN PROFILE PAGE
    public function profile(){
        // SET PAGE TITLE 
        $title = 'Admin Profile';
        // GET LOGGED IN USER ID 
        $id = Auth::user()->id;
        // USE ID TO GET USER DATA 
        $data = User::find($id);
        // RETURN VIEW WITH USER DATA AND TITLE 
        return view('admin.profile',compact('title','data'));
    }

    //UPDATE ADMIN PROFILE
    public function updateProfile(Request $request){
        // GET DETAILS OF LOGGED IN USER 
        $id = Auth::user()->id;
        $user = User::find($id);

        // SET VALIDATION RULES FOR FORM
        $rules = [
            'name'=>'string|required',
            'username'=>'string|required',
            'phone'=>'numeric|required',
            'address'=>'string|required'
        ];

        //VALIDATE FORM
        $formData = $request->validate($rules);

        // HANDLE IMAGE UPLOAD 
        if($photo = $request->file('photo')){
            $directory = '/upload/admin/thumbnails';
            @unlink(public_path($directory).'/'.$user->photo);
            $extension = $photo->getClientOriginalName();
            $filename = date('YmdHi').$extension;
            $photo->move(public_path($directory),$filename);
            $formData['photo'] = $filename;
        }

        //UPDATE USER DATA
        if($saved = $user->update($formData)){
            $notification = [
                'message'=>'Profile Updated Successfully',
                'type'=>'success'
            ];
        }
        else{
            $notification = [
                'message'=>'An Error Occured, Please try again',
                'type'=>'danger'
            ];            
        }
        
        return redirect()->back()->with($notification);


    }

    public function login(){
        $title = "Admin Login";
        return view('admin.login',compact('title'));
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function password(){
        $title = "Admin Change Password";
        return view('admin.password',compact('title'));
    }

    public function updatePassword(Request $request){
        #ALGORITHM
        // 1. Show the User a Form to input 3 fields; Current Password, New Password, Confirm New Password 
        // 2. Validate that the New Password matches it confirmation 
        // 3. Validate that the Old Password Matches the Old Password on the Database  Hash::Check($OldPasswordEntered,$HashedOldPassword)
        // 4. Hash the New Password and Update the Database Record Hash::make($newPassword)
        
        $rules = [
            'old_password'=>'string|required',
            'new_password'=>'string|required|confirmed',
        ];

        $formData = $request->validate($rules);

        //CONFIRM IF CURRENT PASSWORD ENTERED MATCHES CURRENT PASSWORD
       if(!Hash::check($formData['old_password'],Auth::user()->password)){
            return back()->with("error","Old Password Does not Match");
       }
       else{
            $hashedNewPassword = Hash::make($formData['new_password']);

            User::whereId(Auth::user()->id)->update(['password'=>$hashedNewPassword]);   

            return back()->with("success","Password Updated Successfully");
       }

    
    }
}
