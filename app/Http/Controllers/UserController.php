<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard(){
        $title = "User Dashboard";
        $userdata = User::find(auth()->user()->id);
        return view('frontend.dashboard',compact('title','userdata'));
    }

    public function updateUserProfile(Request $request,$id){
        $user = User::find($id);
        
        $rules = [
            'name'=>'string|required',
            'username'=>'string|required',
            'phone'=>'numeric|required',
            'address'=>'string|required'
        ];

        $data = $request->validate($rules);

        if($photo=$request->file('photo')){            
            $directory = '/upload/user/thumbnails';
            @unlink(public_path($directory).'/'.$user->photo);
            $extension = $photo->getClientOriginalExtension();
            $filename = $user->username.".".$extension;
            $photo->move(public_path($directory),$filename);   
            $data['photo'] = $filename;                             
        }
        
        if($user->update($data)){
            $message = [
                'message'=>'User Profile Updated Successfully',
                'type'=>'success'
            ];
            return redirect(route('dashboard')."#account-detail")->with($message);
        }
        else{
            $message = [
                'message'=>'An Error Occured, Please try again',
                'type'=>'error'
            ];            
            return back()->with($message);
        }
    }

    public function updateUserPassword(Request $request,$id){
        
        $user = User::findOrFail($id);

        $rules = [
            'old_password'=>'string|required',
            'password'=>'string|required|confirmed'
        ];

        $data = $request->validate($rules);
        
        //CHECK IF OLD PASSWORD MATCHES CURRENT PASSWORD
        if(Hash::check($request->old_password,$user->password)==true){
            $updateData = ['password'=>Hash::make($request->password)];
            if($user->update($updateData)){
                $message = [
                    'message'=>'Password Changed Successfully',
                    'type'=>'success'
                ];  
            }
            else{
                $message = [
                    'message'=>'An Error Occured, Please try again',
                    'type'=>'error'
                ];              
            }
            return back()->with($message);
        }
        else{
            $message = [
                'message'=>'The Current Password You entered does not match your Current Password',
                'type'=>'error'
            ];
            return back()->with($message);
        }
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $message = [
            'message'=>'User Logged Out Successfully',
            'type'=>'success'
        ];

        return redirect('/login')->with($message);        
    }
}
