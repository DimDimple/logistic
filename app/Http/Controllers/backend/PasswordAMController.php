<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class PasswordAMController extends Controller
{


    public function changePwdM(){
        return view('backend.manager.page.profile.changePassword');
    }

    public function updatePwdM(Request $request){
        # Validation
        // dd($request);
        $request->validate([
            'old_password' => 'required|min:8|',
            'new_password' => 'required|min:8|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password doesn't matches with the password :(");
        }

        //The new password can't be the same with the old password
        if(strcmp($request->old_password, $request->new_password) == 0){
           return back()->with("error", "New Password can't be the same as your Old Password. Pls choose the different password!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("message", "Password changed successfully :) !");
    }

  
}
