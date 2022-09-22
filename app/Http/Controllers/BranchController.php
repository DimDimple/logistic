<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Location;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $branches = Branch::get();
        // $id = Auth::user()->id;
        // $password = Hash::make('password');
        // $branches = Branch::paginate(5);
        // $branch = Branch::find(3);
        // dd($branches->user);
        return view('backend.admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $locations = Location::get();

        return view('backend.admin.branches.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //user

        //$userType = Auth::user()->type;
        //admin create manager
        $type = 2;

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required',

        ]);
        $savedUser = User::create([
            'email' => $request['email'],
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'type' => (int)$type,
        ]);

        if (!$savedUser) {
            abort(503);
        }

        $saveBranch = $savedUser->branches()->create(
            [
                'b_name' => $request->b_name,
                'user_id' => (int)$request->user_id,
                'location_id' => (int)$request->location_id,
                'status' => $request->status,
            ]
        );

        if (!$saveBranch) {
            abort(503);
        }



        // $savedBranch = Branch::create([
        //     'b_name' => $request->b_name,
        //     // 'user_id' => (int)$request->user_id,
        //     'location_id' => (int)$request->location_id,
        //     'status' => $request->status,
        // ]);

        // if (! $savedBranch) {
        //     abort(503);
        // }

        // $saveUser = $savedBranch->users()->create(
        //     [
        //         'name' => $request['name'],
        //         'email' => $request['email'],
        //         'password' => Hash::make($request['password']),
        //         'phone' => $request['phone'],
        //     ]
        // );

        // if (! $saveUser) {
        //     abort(503);
        // }

        return redirect()->route('branch.index')
            ->with('message', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('backend.admin.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        $user = User::find($branch->user_id);
        $locations = Location::get();

        return view('backend.admin.branches.edit', compact('branch', 'locations', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->password);

        $branch = Branch::find($id);
        $user = User::find($branch->user_id);

        if ($request->password == null) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            // $branch->update($user);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:8|confirmed',
                'phone' => 'required|min:7|',
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
        }
        //dd((int)$request->location_id);
        $branch->update(
            [
                'b_name' => $request->b_name,
                'user_id' => (int)$user->id,
                'location_id' => (int)$request->location_id,
                'status' => $request->status
            ]
        );


        // $branch->update($request->all());
        // dd( $branch);
        return redirect()->route('branch.index')
            ->with('message', 'Branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *a
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {

        //1.delete package first
        //2.delete user
        //3.delete branch
        $branch->delete();
        return redirect()->route('branch.index')
            ->with('message', 'Branch deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id)
    {
        $user = Branch::find($id);

        if ($user->status == 'Open') {

            $user->update(['status' => 'Closed']);
            return redirect()->route('branch.index');
        } else {
            $user->update(['status' => 'Open']);
            return redirect()->route('branch.index');
        }
        return redirect()->route('branch.index');
    }
}
