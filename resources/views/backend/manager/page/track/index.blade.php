@extends('backend.manager.layouts.dashboard')

@section('content')
    <!-- start page title -->
    <div class="row justify-content-center" style="margin-left: 16%">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h2 class="mb-0">List All Track</h2>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Package ID</th>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td class="text-center">1</td>
                                    <td class="text-center">Dimple</td>
                                    <td class="text-center">Male</td>
                                    <td class="text-center">Male</td>
                                    <td class="text-center">
                                        <form action="#" method="POST">
                                            <a class="btn btn-info btn-rounded waves-effect waves-light"
                                                href="#">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-rounded waves-effect waves-light">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
