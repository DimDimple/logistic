@extends('backend.admin.layouts.index')

@section('content')
    {{-- <div class="row justify-content-center">
    <div class="col-8">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">All Messages</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <a href="http://dmgo.express/manager/packages/create">Create</a>
                </ol>
            </div>

        </div>
    </div>
</div> --}}
    <div class="row justify-content-center">
        <div class="col-8 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">All Messages</h3>

                        <div class="float-end d-flex">
                            <label class="mx-2 mt-2">Search:</label>
                            <input type="search" class="form-control form-control-sm" placeholder="name" aria-controls="dt-fixed-footer">
                            {{-- <a href="{{ route('branch.create') }}">
                                    <button type="button" class="btn btn-primary btn-sm-rounded waves-effect waves-light">
                                        Add New Branch</button>
                                </a> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="datatable">
                            @foreach ($contacts as $key => $contact)
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">

                                        <a class="btn btn-info btn-sm-rounded btn-sm waves-effect waves-light"
                                            href="{{ route('contact.show', $contact->id) }}">Show</a>

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
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
