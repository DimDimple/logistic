@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <h4 class="my-3">Manage Location</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- <label for="firstname" class="col-sm-2 col-form-label">Last Name</label> --}}
                        <form action="{{ route('location.store') }}" class="d-flex" method="POST">
                            @csrf
                                <input class="form-control" type="text" id="province" name="province"
                                    placeholder="Enter province or city">
                                <button type="submit" class="btn btn-primary btn-sm-rounded">Add Location</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">List of locations</h3>

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
                                <th>Province</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($locations as $key => $location)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    {{-- <td>{{ $location->id }}</td> --}}
                                    <td>{{ $location->province }}</td>
                                    <td>
                                        <form action="{{ route('location.destroy', $location->id) }}" method="POST">

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
