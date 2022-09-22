<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileAController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = User:: get();

        return view('backend.admin.profile.editProfile', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()

    {

       
        $user = auth()->user();
        $data['user'] = $user;
        return view('backend.admin.profile.editProfile', $data, array('user'=>Auth::user()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            // 'address' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        if($user){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                // $user->email = $request->get('email'),
                // $user->phone = $request->get('phone'),
                // $user->address = $request->get('address'),
            ]);
        }

        // return redirect()->route('editProfile',array('user' => Auth::user()))->with('success', 'Profile updated successfully');
        return redirect()->back()->with('message','User Successfully');
    }
    public function upload(Request $request)
    {
        // dd($request->hasFile('image'));
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back()->with('message','Profile update Successfully');;;
    }

}
