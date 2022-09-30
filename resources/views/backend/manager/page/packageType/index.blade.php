@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <h4 class="my-3">Package Type</h4>

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        {{-- <label for="firstname" class="col-sm-2 col-form-label">Last Name</label> --}}
                        <form action="{{ route('packageType.store') }}" class="d-flex" method="POST">
                            @csrf
                            <input class="form-control" type="text" id="package_type" name="package_type"
                                placeholder="Enter package type" style="">
                            <button type="submit" class="btn btn-primary btn-sm-rounded" style="margin-left:5px">Add
                                Package Type</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">List of Package Type</h3>

                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert bg-light text-dark">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table id="selection-datatable" class="table dt-responsive nowrap w-100 ">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Package Type</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($package_types as $key => $package_type)
                                <tr>

                                    <th scope="row">{{ ++$key }}</th>
                                    {{-- <td>{{ $location->id }}</td> --}}
                                    <td>{{ $package_type->package_type }}</td>
                                    <td>{{ $package_type->created_at->toDateString() }}</td>
                                    <td>{{ $package_type->updated_at->toDateString() }}</td>
                                    <td>
                                        <form action="{{ route('packageType.destroy', $package_type->id) }}" method="POST">
                                            <a href="{{ route('packageType.edit', $package_type->id) }}"
                                                data-toggle="tooltip" title='Edit'><i class='bx bx-edit'
                                                    style='color:#0f07e6;font-size:20px'></i></a>

                                            @csrf
                                            @method('DELETE')
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a type="submit" data-toggle="tooltip" title='Delete'><i
                                                    class='bx bx-trash show-alert-delete-box'
                                                    style='color:#f51028; font-size:20px'></i></a>

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
