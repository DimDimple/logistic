@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">employee Information</h4>
            </div>
        </div>
    </div>
    <div style="display:flex; justify-content:center; align-items:center; flex-direction:column;">
        <div>
            <div class="shadow-lg p-3 mb-5 bg-white rounded text-primary" style="font-size: 20px; width:1400px;">
                <strong>Employee
                    ID:</strong>
                {{ $employee->id }}
            </div>
        </div>
        <div>
            <div style="display:flex; margin-top: 10px">

                <div class="shadow-lg p-3 mb-5 bg-white rounded" style=" width:1400px"><strong style="font-size: 20px;"
                        class="d-flex align-items-center justify-content-center">Employee
                        Information</strong>
                    <div class="header-u" style="margin-top:30px;display:flex; margin-left:215px">
                        <div style="width: 220px">
                            <h5 class="card-title">First Name</h5>
                            {{ $employee->firstname }}
                        </div>
                        <div style="width: 200px; margin-left:50px">
                            <h5 class="card-title">Last Name</h5>
                            {{ $employee->lastname }}
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center;align-items:center;flex-direction:column;margin-left:120px" >
                        <div class="header-u" style="margin-top:20px;display:flex">
                            <div style="width: 250px">
                                <h5 class="card-title">Gender</h5>
                                {{ $employee->gender }}
                            </div>
                            <div style="width: 250px; margin-left:20px">
                                <h5 class="card-title">Email</h5>
                                {{ $employee->email }}
                            </div>
                            <div style="width: 250px; margin-left:20px">
                                <h5 class="card-title">Position</h5>
                                {{ $employee->type->type }}
                            </div>
                            <div style="width: 250px; margin-left:20px">
                                <h5 class="card-title text-warning">Phone Number</h5>
                                {{ $employee->phone }}
                            </div>
                        </div>
                        <div class="header-u" style="margin-top:20px;display:flex">
                            <div style="width: 250px">
                                <h5 class="card-title">Date Of Birth</h5>
                                {{ $employee->dob }}
                            </div>
                            <div style="width: 250px; margin-left:20px">
                                <h5 class="card-title">Place Of Birth</h5>
                                {{ $employee->pob }}
                            </div>
                            <div style="width: 250px; margin-left:20px">
                                <h5 class="card-title">Address</h5>
                                {{ $employee->address }}
                            </div>
                            <div style="width: 250px; margin-left:20px">
                                <h5 class="card-title text-danger">Branch</h5>
                                {{ $branch->b_name }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
