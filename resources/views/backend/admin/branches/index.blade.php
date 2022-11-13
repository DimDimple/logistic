@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center ">

        <div class="col-10 mt-4">
            <div class="float-end" style="margin-top:-3%">
                <a href="{{ route('branch.create') }}">
                    <button type="button" class="btn btn-primary btn-sm-rounded waves-effect waves-light">
                        Add New Branch</button>
                </a>
            </div>
            <div class="card">

                <div class="card-body">

                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">Manage Branch</h3>
                        <div class="float-end">

                            <a href="{{ route('branch.export') }}">
                                <button type="button" class="btn btn-success" style="margin-top:-1%">Export
                                    Excel</button>
                            </a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table id="myTable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">
                        <thead class="table-light">

                            <tr>
                                <th>Branch No.</th>
                                <th>Branch Name</th>
                                <th>Manager Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($branches as $key => $branch)
                                {{-- @php
                                        // dd($branch->users);
                                        $branches = $branch->users()->first();

                                    @endphp --}}
                                {{-- @foreach ($branches->users as $user)

                                    @endforeach --}}
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    {{-- <th>{{ $branch->branch_id }}</th> --}}
                                    <td>{{ $branch->b_name }}</td>
                                    <td>{{ $branch->user->name }}</td>
                                    <td>{{ $branch->user->email }}</td>
                                    <td>{{ $branch->user->phone }}</td>
                                    <td>{{ $branch->location->province }}</td>
                                    <td>{{ date('d-m-Y', strtotime($branch->created_at)) }}</td>
                                    {{-- @dd($branch->user->name); --}}
                                    @if ($branch->status == 'Open')
                                        <td>
                                            <a href="{{ route('updateBranchStatus', $branch->id) }}"
                                                class="badge rounded-pill bg-success"
                                                style="font-size:1.1em">{{ $branch->status }}</a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ route('updateBranchStatus', $branch->id) }}"
                                                class="badge rounded-pill bg-danger"
                                                style="font-size:1.1em">{{ $branch->status }}</a>
                                        </td>
                                    @endif
                                    <td>
                                        <form action="{{ route('branch.destroy', $branch->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm-rounded btn-sm waves-effect waves-light"
                                                href="{{ route('branch.show', $branch->id) }}">Show</a>

                                            <a class="btn btn-warning btn-sm-rounded btn-sm waves-effect waves-light"
                                                href="{{ route('branch.edit', $branch->id) }}">Edit</a>

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
                    {{-- <div class="clearfix">
                        Showing {{ $branch->firstItem() }} to {{ $branch->lastItem() }}
                        of total {{ $branch->total() }} entries

                        <div class="float-end">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $branch->previousPageUrl() }}"aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $branch->lastPage(); $i++)
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $branch->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $branch->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->



    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
    {{-- show button --}}
    {{-- <a class="btn btn-success btn-sm-rounded btn-sm waves-effect waves-light"
                                                 href="#">Show</a> --}}
@endsection
