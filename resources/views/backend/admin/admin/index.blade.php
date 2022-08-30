@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="row justify-content-center ">
            <div class="col-10 mt-4">

                <div class="card">

                    <div class="card-body">

                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">Admin</h3>
                            <div class="float-end">
                                <a href="{{ route('admin.create') }}">
                                    <button type="button" class="btn btn-primary btn-sm-rounded waves-effect waves-light">
                                        Add New Admin</button>
                                </a>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table id="selection-datatable" class="table dt-responsive nowrap w-100 ">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($admins as $key => $admin)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                       
                                        <td>{{ $admin->name }}</td>   
                                        <td>{{ $admin->email }}</td>
                                        
                                        <td>{{ $admin->phone  }}</td>
                                        <td>{{ $admin->created_at->toDateString() }}</td>
                
                                        <td>
                                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">

                                                <a class="btn btn-warning btn-sm-rounded btn-sm waves-effect waves-light"
                                                    href="{{ route('admin.edit', $admin->id) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
