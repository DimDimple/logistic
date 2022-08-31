@extends('backend.manager.layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Employee</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">List Employee in Branch</h1>
                    <div class="form-outline" style="width:20%; display:flex">
                        <input type="search" class="form-control" id="datatable-search-input" style=" margin-top:3%"
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
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($employees as $key => $employee)
                                {{-- @if ($employee->branch_id == $branch_id) --}}
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $employee->firstname }}</td>
                                    <td>{{ $employee->lastname }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        {{ $employee->type->type }}
                                    </td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->address }}</td>

                                    <td>
                                        <form action="{{ route('employeebranch.destroy', $employee->id) }}" method="POST">

                                            <a class="btn btn-info btn-sm-rounded btn-sm waves-effect waves-light"
                                                href="{{ route('employeebranch.show', $employee->id) }}">Show</a>

                                            <a class="btn btn-warning btn-sm-rounded btn-sm waves-effect waves-light"
                                                href="{{ route('employeebranch.edit', $employee->id) }}">Edit</a>

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

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
