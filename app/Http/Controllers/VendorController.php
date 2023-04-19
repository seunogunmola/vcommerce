<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function dashboard(){
        $title = "Vendor Dashboard";
        return view('vendor.dashboard',compact('title'));
    }

    public function login(){
        $title = "Vendor Login";
        return view('vendor.login',compact('title'));
    }

    public function profile(){
        #GET VENDOR DATA
        $data = User::find(Auth::user()->id);
        $title = "Vendor Profile";
        return view('vendor.profile',compact('title','data'));
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

    public function password(){
        $title = "Change Password";
        return view('vendor.password',compact('title'));
    }

    public function updatePassword(Request $request){
        $rules = [
            'old_password'=>'string|required',
            'new_password'=>'string|required|confirmed'
        ];

        $data  = $request->validate($rules);

        if(!Hash::check($data['old_password'],Auth::user()->password)){
            return back()->with("error","Current Password is Incorrect");
        }
        else{
            $newHashedPassword = Hash::make($data['new_password']);

            User::whereId(Auth::user()->id)->update(['password'=>$newHashedPassword]);

            return back()->with("success","Password Updated Successfully");
        }

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }
}
