@extends('backend.manager.layouts.dashboard')

@section('content')
    <!-- start page title -->
    <div class="row justify-content-center" style="margin-left: 8%">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h2 class="mb-0 py-3">List All User</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert bg-light text-dark" style="height:45px">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">User ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Update Date</th>
                                <th class="text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr data-id="1">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->type }}</td>
                                    <td class="text-center">{{ $user->created_at }}</td>
                                    <td class="text-center">{{ $user->updated_at }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            <a class="btn btn-info btn-rounded waves-effect waves-light"
                                                href="{{ route('user.edit', $user->id) }}">Edit</a>
                                           
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
