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
                <button type="button" class="btn btn-secondary" style="margin-left: 90%;margin-top:-3%">Export
                    Excel</button>
            </a>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    <a href="{{ route('employeebranch.create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                            style="margin-left: 88%;margin-top:-1%">Create New Employee</button></a>
                    <h1 class="card-title">List Employee in Branch</h1>
                    {{-- <form action="{{ route('searchEmployee') }}" method="POST">
                        @csrf
                        <div class="form-outline">
                            <input type="text" name="q" placeholder="Search name and email..."
                                style="width:300px; height:40px; padding-left:10px; border:1px solid rgb(219, 219, 219); border-radius:5px" />
                            <button type="submit"
                                style="height:39px; margin-left:3px; border:1px solid rgb(219, 219, 219); border-radius:5px; background-color:rgb(109, 109, 246);color:#fff;padding:0 10px">
                                Search </button>
                        </div>

                    </form> --}}
                   
                    @if ($message = Session::get('success'))
                        <div class="alert bg-light text-dark">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table id="myTable" class="table table-bordered dt-responsive nowrap "
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">
                        <thead>
                            <tr >
                                <th class="text-center">Full Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Joined</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $key => $emp)
                                {{-- @if ($employee->branch_id == $branch_id) --}}
                                <tr class="text-center">

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
                            {{-- @if (!isset($employees[0]->email))
                                <tr class="text-center">
                                    <td>null</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td> null </td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td>null</td>

                                </tr>
                            @endif --}}
                        </tbody>
                    </table>
                    {{-- {{ $employees->links('vendor.pagination.custom') }} --}}

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr ").filter(function() {
                    $(this).toggle($(this.children[1]).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> --}}
@endsection

<style>
    .page-item.active .page-link {
        z-index: 2;
        color: #fff !important;
        background-color: #4f9dff !important;
        border-color: #4f9dff !important;
        border-radius: 25%;
        padding: 2px 8px;
    }

    .page-link {
        z-index: 2;
        color: #4f9dff !important;
        background-color: #fff;
        border-color: #007bff;
        border-radius: 25%;
        padding: 2px 8px !important;
    }

    .page-item:first-child .page-link {
        border-radius: 13% !important;
    }

    .page-item:last-child .page-link {
        border-radius: 13% !important;
    }

    .pagination li {
        padding: 3px;
    }

    .disabled .page-link {
        color: #212529 !important;
        opacity: 0.5 !important;
    }
</style>
