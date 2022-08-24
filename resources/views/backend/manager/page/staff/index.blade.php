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
                        <input type="search" class="form-control" id="datatable-search-input" style=" margin-top:3%" placeholder="Search">
                    </div>
                    <button type="button" class="btn btn-primary waves-effect waves-light" style="margin-left: 90%;margin-top:-3%"">Create Employee</button>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                           <tr class="text-center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td >
                                {{-- <form action="{{ route('employeeBranch.destroy', $staff->id) }}" method="POST">

                                    <a class="btn btn-success btn-rounded waves-effect waves-light"
                                        href="{{ route('employeeBranch.show', $staff->id) }}">Detail</a>

                                    <a class="btn btn-info btn-rounded waves-effect waves-light"
                                        href="{{ route('employeeBranch.edit', $staff->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-rounded waves-effect waves-light">Delete</button>
                                </form> --}}
                            </td>

                           </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
