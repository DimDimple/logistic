@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <h4 class="my-3">Position</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- <label for="firstname" class="col-sm-2 col-form-label">Last Name</label> --}}
                        <form action="{{ route('position.store') }}" class="d-flex" method="POST" >
                            @csrf
                                <input class="form-control" type="text" id="type" name="type"
                                    placeholder="Enter Position" style="">
                                <button type="submit" class="btn btn-primary btn-sm-rounded" style="margin-left:4px">Add New Position</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">List of Position</h3>

                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table id="selection-datatable" class="table dt-responsive nowrap w-100 ">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Position</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($types as $key => $type)
                                <tr>
                                    
                                    <th scope="row">{{ ++$key }}</th>
                                    {{-- <td>{{ $location->id }}</td> --}}
                                    <td>{{ $type->type}}</td>
                                    <td>{{ $type->created_at->toDateString() }}</td>
                                   
                                    <td>
                                        <form action="{{ route('position.destroy', $type->id) }}" method="POST">

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

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

    </div>
@endsection
