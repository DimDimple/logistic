@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="row justify-content-center ">
            <div class="col-10 mt-4">

                <div class="card">

                    <div class="card-body">

                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">List All User</h3>
                            <div class="float-end">
                                <a href="{{ route('user.create') }}">
                                    <button type="button" class="btn btn-primary btn-sm-rounded waves-effect waves-light">
                                        Add New User</button>
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
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                       
                                        <td>{{ $user->name }}</td>   
                                        <td>{{ $user->email }}</td>
                                        
                                        <td>{{ $user->phone  }}</td>
                                        <td>{{ $user->created_at->toDateString() }}</td>
                
                                        <td>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">

                                                <a class="btn btn-warning btn-sm-rounded btn-sm waves-effect waves-light"
                                                    href="{{ route('user.edit', $user->id) }}">Edit</a>

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
