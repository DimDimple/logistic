<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //find all user admin
        // where need get or first
        $admins = User::where('type', '=', 1)->get();
       
        return view('backend.admin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new User();
        return view('backend.admin.admin.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new admin type = 1
        $type=1;

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
           
        ]);
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

        return redirect()->route('admin.index')
        ->with('message', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
      
        return view('backend.admin.admin.edit', compact('admin'));
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
       
        //find id admin in database
        $admin = User::find($id);

        // @dd(isset($request->name));
        //isset check request if it true or false
        if(isset($request->name)) {
            $admin->name = $request->name;
        }
        if(isset($request->email)){
            $admin->email = $request->email;
        }
       if(isset($request->phone)){
        $admin->phone = $request->phone;
       }

        //save data to database
        $admin->save();
        return redirect()->route('admin.index')
        ->with('message', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find id admin to delete
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('admin.index')
        ->with('message', 'Admin deleted successfully');
    }
}
