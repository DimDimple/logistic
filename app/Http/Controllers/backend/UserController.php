<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', '=', 0)->get();
        return view('backend.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('backend.admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type=0;

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required',

        ]);
        //  #Match The Old Password
        //  if(Hash::check($request->password !== $request->password)){
        //     return back()->with("error", "Confirm Password doesn't matches with the password :(");
        // }
        $savedUser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'type' => (int)$type,
        ]);

        if (!$savedUser) {
            abort(503);
        }

        return redirect()->route('user.index')
        ->with('message', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user= User::find($id);

        // @dd(isset($request->name));
        //isset check request if it true or false
        if(isset($request->name)) {
            $user->name = $request->name;
        }
        if(isset($request->email)){
            $user->email = $request->email;
        }
       if(isset($request->phone)){
        $user->phone = $request->phone;
       }

        //save data to database
        $user->save();

        return redirect()->route('user.index')
            ->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete by id
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')
                ->with('message', 'User deleted successfully');
    }

    public function resetPassword($id){
        $user = User::find($id);
        return view('backend.admin.user.reset', compact('user'));
    }
    public function setPassword(Request $request, $id){


        // dd($user);
        $request->validate([
            'password'=>'required|min:8|confirmed'

        ]);

        User::whereId($id)->update([
            'password'=> Hash::make($request->password)
        ]);



        return redirect()->route('user.index')
            ->with('message', 'User reset password successfully');
    }
}
