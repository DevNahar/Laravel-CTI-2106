<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Image;
d




class UserController extends Controller
{
    function users(){
        //je login korbe takhe delete korar jonno
        $users = User::where('id', '!=', Auth::id())->get();

        //for all users
        // $users = User::all();

        //for total user count
        $total_user = User::count();

        return view('admin.users.user_list',compact('users', 'total_user'));
    }
    function delete($user_id){
        User::find($user_id)->delete();
        return back()->with('delete','User deleted successfully') ;
    }

    function profile(){
        return view('admin.users.profile');
    }
    function changeName(Request $request){
        User::find(Auth::id())->update([
            'name'=>$request->name,
        ]);
        return back()->with('nameUpdate', 'name has been updated');
    }

    //password validation
    function changePass(Request $request){
        $request->validate([
            'oldPassword'=>'required',
            'password'=>['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation'=>'required'
        ],[
            'oldPassword.required'=> 'ager password dao',
            'password.required'=> 'new password dao',
            'password.confirmed'=> 'new password R confirm password mile nai',//New password and confirmed password should be same
            'password_confirmation.required'=> 'confirm password dao',


        ]);

        if(Hash::check($request->oldPassword, Auth::user()->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password)
            ]);
            return back()->with('pass_success', ' password updated successfully') ;
        }
        else{
            return back()->with('errorpass', 'old password bul ase') ;
        }
    }
    //for profile photo change

    function changePhoto(Request $request){
       $profile_photo = $request->profile_photo;
       if(Auth::user()->profile_photo != 'default.jpg'){
            $path = public_path('uploads/users/'. Auth::user()->profile_photo);
            unlink($path);
            $extension = $profile_photo->getClientOriginalExtension();
            $filename = Auth::id(). '.'.$extension;
            $img = Image::make($profile_photo)->save(public_path('uploads/users/'.$filename));
            User::find(Auth::id())->update([
                'profile_photo'=>$filename,
            ]);

            return back()->with('photo_success','photo has been updated');

        }else{
            $extension = $profile_photo->getClientOriginalExtension();
            $filename = Auth::id(). '.'.$extension;
            $img = Image::make($profile_photo)->save(public_path('uploads/users/'.$filename));
            User::find(Auth::id())->update([
                'profile_photo'=>$filename,
            ]);

            return back()->with('photo_success','photo has been updated');
        }
    }

}
