<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\EmployeeBranch;
use App\Models\Branch;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;



        $employees = EmployeeBranch::where('branch_id', '=', $branch_id)->get();


        return view('backend.manager.page.employeeBranch.index', compact('employees', 'branch_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        $type = Position::get();
        // @dd($branch_id);

        // $employees = EmployeeBranch::where('branch_id','=', $branch_id)->first();
        // $employees = EmployeeBranch::where('branch_id', '=', $branch_id)->get();


        // if(!$employees) {
        //     $employees = [];
        // }
        // $branches->id=$employees;

        return view('backend.manager.page.employeeBranch.create', compact('branches', 'branch_id','type'));
    }

    /**`qc
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'address' => 'required',
            'branch_id' => 'required',
            'type_id' => 'required',
        ]);
        //create employee
        EmployeeBranch::create($request->all());
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        //
        $employees = EmployeeBranch::where('branch_id', '=', $branch_id)->get();
        // $employees = EmployeeBranch::latest()->paginate(5);

        return redirect()->route('employeebranch.index', compact('employees'))
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeBranch  $employeeBranch
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeBranch $employeeBranch)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeBranch  $employeeBranch
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeBranch $employeeBranch)
    {
        return view('backend.manager.page.employeeBranch.edit', compact('employeeBranch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeBranch  $employeeBranch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeBranch $employeeBranch)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'address' => 'required',
            'branch_id' => 'required',
            'type_id' => 'required',
        ]);
        $employeeBranch->update($request->all());
        return redirect()->route('employeebranch.index')
            ->with('succees', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeBranch  $employeeBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeBranch $employeeBranch)
    {
        //
        $employeeBranch->delete();
        return redirect()->route('employeeBranch.index')
            ->with('success', 'Package deleted successfully');
    }
}
