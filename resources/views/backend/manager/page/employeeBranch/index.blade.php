@extends('backend.manager.layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Employee</h4>
                <i class='bx bx-calendar-week' style="margin-right:60%"></i>
                <span id="time" style=" position:absolute; margin-left:40%"></span>
            </div>
            
            <a href="{{ route('employee.export') }}">
                <button type="button" class="btn btn-secondary"
                style="margin-left: 90%;margin-top:-3%">Export Excel</button>
            </a>
            
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">List Employee in Branch</h1>
                    <div class="form-outline" style="width:20%; display:flex">
                        <input type="search" class="form-control" id="myInput" style="margin-top:3%"
                            placeholder="Search">
                         
                    </div>
                    <a href="{{ route('employeebranch.create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            style="margin-left: 88%;margin-top:-3%">Create New Employee</button></a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;margin-top:2%">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody id="myTable">
                            @foreach ($employees as $key => $emp)
                                {{-- @if ($employee->branch_id == $branch_id) --}}
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $emp->firstname }} {{ $emp->lastname }}</td>
                                    <td>{{ $emp->email }}</td>
                                    <td>
                                        {{ $emp->type->type }}
                                    </td>
                                    <td>{{ $emp->phone }}</td>
                                    <td>{{ $emp->address }}</td>
                                    <td>{{ $emp->created_at->toDateString() }}</td>
                                    <td>
                                        <form action="{{ route('employeebranch.destroy', $emp->id) }}" method="POST">

                                            <a class="btn btn-info btn-sm-rounded btn-sm waves-effect waves-light"
                                                href="{{ route('employeebranch.show', $emp->id) }}">Show</a>

                                            <a class="btn btn-warning btn-sm-rounded btn-sm waves-effect waves-light"
                                                href="{{ route('employeebranch.edit', $emp->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit"
                                                class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                                data-toggle="tooltip" title='Delete'>Delete</button>

                                        </form>
                                    </td>

                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                    {{$employees->links('vendor.pagination.custom')}}

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

<style>
    .page-item.active .page-link{
        z-index: 2;
        color: #fff !important  ;
        background-color: #4f9dff !important;
        border-color: #4f9dff !important;
        border-radius: 25%;
        padding: 2px 8px;
    }
    .page-link{
        z-index: 2;
        color: #4f9dff !important;
        background-color: #fff;
        border-color: #007bff;
        border-radius: 25%;
        padding: 2px 8px !important;
    }
    .page-item:first-child .page-link{
        border-radius: 13% !important;
    }
    .page-item:last-child .page-link{
        border-radius: 13% !important;   
    }
    .pagination li{
        padding: 3px;
    }
    .disabled .page-link{
        color: #212529 !important;
        opacity: 0.5 !important;
    }
</style>