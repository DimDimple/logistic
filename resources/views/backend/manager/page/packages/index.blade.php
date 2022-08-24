@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Package</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="http://dmgo.express/manager/packages/create">Create</a>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">List Package</h1>
                    @if ($message = Session::get('success'))
                        <div class="alert bg-light text-dark" style="height:45px">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="form-outline" style="width:20%; display:flex">
                        <input type="search" class="form-control" id="datatable-search-input" style=" margin-top:3%"
                            placeholder="Search">
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">
                        <thead>
                            <tr class="text-center">
                                <th>Reference Number</th>
                                <th>Sender Phone Number</th>
                                <th>Receiver Phone Number</th>
                              
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($packages as $key => $package)
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $package->sender_phone }}</td>
                                    <td>{{ $package->receiver_phone }}</td>
                                    
                                    <td>{{ $package->status }}</td>
                                    {{-- @if ($package->pay_status == 'Paid')
                                        <td>
                                            <a href="{{ route('updatepaystatus', $package->id) }}"
                                                class="badge rounded-pill bg-success"
                                                style="font-size:1.1em">{{ $package->pay_status }}</a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ route('updatepaystatus', $package->id) }}"
                                                class="badge rounded-pill bg-danger"
                                                style="font-size:1.1em">{{ $package->pay_status }}</a>
                                        </td>
                                    @endif --}}
                                    {{-- <td class="text-center">
                                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST">

                                        <a class="btn btn-success btn-rounded waves-effect waves-light"
                                            href="{{ route('packages.show', $package->id) }}">Detail</a>

                                        <a class="btn btn-info btn-rounded waves-effect waves-light"
                                            href="{{ route('packages.edit', $package->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-rounded waves-effect waves-light">Delete</button>
                                    </form>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
