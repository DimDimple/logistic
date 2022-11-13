<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;

        $employees = Employee::where('branch_id', '=', $branch_id)->paginate(5);
        // $employees = Employee::latest()->paginate(5);
        // dd($employees);

        //  $search = $request->q;

        // if($search!=""){
        //     $employees = Employee::where(function ($query) use ($search){
        //         $query->where('firstname', 'like', '%'.$search.'%')->orwhere('lastname','like','%'.$search.'%')
        //             ->orWhere('email', 'like', '%'.$search.'%')
        //             ->orWhere('gender', 'like', '%'.$search.'%')
        //             ->orWhere('address', 'like', '%'.$search.'%')
        //             ->orWhere('phone', 'like', '%'.$search.'%');
        //     })
        //     ->paginate(5);
        //     $employees->appends(['q' => $search]);
        //     // dd($employees);
        // }
        // else{
        //     $employees = Employee::latest()->paginate(5);
        // }

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
            ->with('message', 'Employee created successfully.');
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
            ->with('message', 'Employee updated successfully');
    }


    public function excel()
    {
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first()->b_name;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        // dd($branch_id);

        if(File::exists(public_path('report/EmployeeReport-' . $branch . '.xlsx'))){
            File::delete(public_path('report/EmployeeReport-' . $branch . '.xlsx'));
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'firstname');
        $sheet->setCellValue('C1', 'lastname');
        $sheet->setCellValue('D1', 'gender');
        $sheet->setCellValue('E1', 'email');
        $sheet->setCellValue('F1', 'position');
        $sheet->setCellValue('G1', 'phone');
        $sheet->setCellValue('H1', 'address');
        $sheet->setCellValue('I1', 'dob');
        $sheet->setCellValue('J1', 'pob');


        $employees = Employee::where('branch_id', '=', $branch_id)->get();
        // dd($employees);
        $rows = 2;

        foreach ($employees as $employee) {

            $sheet->setCellValue('A' . $rows, $employee['id']);
            $sheet->setCellValue('B' . $rows, $employee['firstname']);
            $sheet->setCellValue('C' . $rows, $employee['lastname']);
            $sheet->setCellValue('D' . $rows, $employee['gender']);
            $sheet->setCellValue('E' . $rows, $employee['email']);
            $sheet->setCellValue('F' . $rows, $employee['type']->type);
            $sheet->setCellValue('G' . $rows, $employee['phone']);
            $sheet->setCellValue('H' . $rows, $employee['address']);
            $sheet->setCellValue('I' . $rows, $employee['dob']);
            $sheet->setCellValue('J' . $rows, $employee['pob']);

            $rows++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('report/EmployeeReport-' . $branch . '.xlsx');

        return redirect()->route('employeebranch.index')
            ->with('message', 'Excel exported successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, $id)
    {
        //
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employeebranch.index')
            ->with('message', 'Package deleted successfully');
    }
}
