<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\EmployeeBranch;
use Illuminate\Http\Request;

class EmployeeBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_branch = EmployeeBranch::latest()->paginate(5);
        return view('backend.manager.page.staff.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.manager.page.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        ]);

        EmployeeBranch::create($request->all());

        return redirect()->route('employee.index')
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
        return view('backend.admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeBranch  $employeeBranch
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeBranch $employeeBranch)
    {
        //
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
        //
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
    }
}
