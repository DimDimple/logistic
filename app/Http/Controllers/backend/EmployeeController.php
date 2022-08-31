<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
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

        $employees = Employee::where('branch_id', '=', $branch_id)->get();
        // dd($employees);

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
        $types = Position::get();
        // @dd($branch_id);

        // $employees = EmployeeBranch::where('branch_id','=', $branch_id)->first();
        // $employees = EmployeeBranch::where('branch_id', '=', $branch_id)->get();


        // if(!$employees) {
        //     $employees = [];
        // }
        // $branches->id=$employees;

        return view('backend.manager.page.employeeBranch.create', compact('branches', 'branch_id', 'types'));
    }

    /**
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
        Employee::create($request->all());
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        //
        $employees = Employee::where('branch_id', '=', $branch_id)->get();
        // $employees = EmployeeBranch::latest()->paginate(5);

        return redirect()->route('employeebranch.index', compact('employees'))
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();
        $departure_id = $branch->id;
        $employee = Employee::find($id);
        $types = Position::get();
       

        return view('backend.manager.page.employeeBranch.show', compact('employee', 'branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // @dd($id);
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        $employee = Employee::find($id);

        // $employee = Employee::get();
        $types = Position::get();
       

        return view('backend.manager.page.employeeBranch.edit', compact('employee', 'branches', 'branch_id', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $employee = Employee::find($id);
      
        if (isset($request->firstname)) {
            $employee->firstname = $request->firstname;
        }
        if (isset($request->lastname)) {
            $employee->lastname = $request->lastname;
        }
        if (isset($request->gender)) {
            $employee->gender = $request->gender;
        }
        if (isset($request->email)) {
            $employee->email = $request->email;
        }
        if (isset($request->phone)) {
            $employee->phone = $request->phone;
        }
        if (isset($request->dob)) {
            $employee->dob = $request->dob;
        }
        if (isset($request->pob)) {
            $employee->pob = $request->pob;
        }
        if (isset($request->address)) {
            $employee->address = $request->address;
        }
        if (isset($request->type_id)) {
            $employee->type_id = $request->type_id;
        }

        $employee->save();
        // $request->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'gender' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'dob' => 'required',
        //     'pob' => 'required',
        //     'address' => 'required',
        //     'branch_id' => 'required',
        //     'type_id' => 'required',

        // ]);


        return redirect()->route('employeebranch.index')
            ->with('succees', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('employeebranch.index')
            ->with('success', 'Package deleted successfully');
    }
}
