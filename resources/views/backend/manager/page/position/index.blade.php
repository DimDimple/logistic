@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <h4 class="my-3">Position</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- <label for="firstname" class="col-sm-2 col-form-label">Last Name</label> --}}
                        <form action="{{ route('position.store') }}" class="d-flex" method="POST">
                            @csrf
                            <input class="form-control" type="text" id="type" name="type"
                                placeholder="Enter Position" style="">
                            <button type="submit" class="btn btn-primary btn-sm-rounded" style="margin-left:4px">Add New
                                Position</button>
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
                        <div class="alert bg-light text-dark">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table id="Tables" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">
                        <thead >
                            <tr>
                                <th>NO</th>
                                <th>Position</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($types as $key => $type)
                                <tr>

                                    <th scope="row">{{ -(++$key - ($type->count())) + 1 }}</th>
                                    {{-- <td>{{ $location->id }}</td> --}}
                                    <td>{{ $type->type }}</td>
                                    <td>{{ $type->created_at->toDateString() }}</td>
                                    <td>{{ $type->updated_at->toDateString() }}</td>
                                    <td>
                                        <form action="{{ route('position.destroy', $type->id) }}" method="POST">

                                            <a
                                                href="{{ route('position.edit',$type->id ) }}" data-toggle="tooltip" title='Edit'><i class='bx bx-edit' style='color:#0f07e6;font-size:20px'  ></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a type="submit"
                                                data-toggle="tooltip" title='Delete'><i class='bx bx-trash show-alert-delete-box' style='color:#f51028; font-size:20px'  ></i></a>

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
