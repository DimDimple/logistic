@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Package</h4>
                <h4 class="mb-0">{{ $currentBranch }}</h4>
                <i class='bx bx-calendar-week' style="margin-right:10%"></i>
                <span id="time" style="position:absolute; margin-left:89%"></span>
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
                    @if ($sendmessage != '')
                        <div class="alert bg-light text-dark" style="height:45px">
                            <p>{{ $sendmessage }}</p>
                        </div>
                    @endif
                    <form action="{{ route('updatefilterstatus') }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="d-flex align-items-center justify-content-center">

                            <div class="card bg-white rounded" style="width:100%">
                                <div class="p-2 text-white text-lg bg-secondary"><span class="">Update Status</span>
                                </div>
                                <div class="d-flex">
                                    <div class=" row mb-3">
                                        <label class="form-label" for="form7Example1">From</label>
                                        <div class="col-sm-10">
                                            <input data-parsley-type="date" type="date" class="form-control"
                                                name="starts_date" />
                                        </div>
                                    </div>
                                    <div class=" row mb-3">
                                        <label class="form-label" for="form7Example1">To</label>
                                        <div class="col-sm-10">
                                            <input data-parsley-type="date" type="date" class="form-control"
                                                name="ends_date" />
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="margin-top:29px">
                                        <a><button type="submit" class="btn btn-primary">
                                                Submit
                                            </button></a>

                                    </div>

                                    @if ($ends != '' && $starts != '')
                                        <div class="row mb-3" style="margin-left:25px">
                                            <label class="form-label" for="form7Example1">Status</label>
                                            <div class="col">
                                                <select class="form-select" aria-label="Disabled select example"
                                                    name="status">
                                                    <option selected>Select Status</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Shipped">Shipped</option>
                                                    <option value="Received">Received</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input name="starts" type="hidden" value="{{ $starts }}">
                                        <input name="ends" type="hidden" value="{{ $ends }}">
                                        <div class="row mb-3" style="margin-left:25px;margin-top:29px">
                                            <a><button type="submit" class="btn btn-success">
                                                    Update
                                                </button></a>

                                        </div>
                                    @endif


                                </div>

                            </div>


                        </div>
                    </form>


                    <table id="myTable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">

                        <thead>
                            <a href="{{ route('package.export') }}">
                                <button type="button" class="btn btn-success"
                                    style="margin-left: 93%;margin-top:-2%">Export
                                    Excel</button>
                            </a>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Tracking No</th>
                                <th class="text-center">Sender Phone Number</th>
                                <th class="text-center">Receiver Phone Number</th>
                                <th class="text-center">Origin</th>
                                <th class="text-center">Destination</th>
                                <th class="text-center">Weight</th>
                                <th class="text-center">Delivery Charge</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @foreach ($packages as $key => $package)
                                @if ($package->departure_id == $branch_id || $package->destination_id == $branch_id)
                                    <tr class="text-center">
                                        <td>{{ $package->created_at->toDateString() }}</td>
                                        <td>{{ $package->reference_number }}</td>
                                        <td>{{ $package->sender_phone }}</td>
                                        <td>{{ $package->receiver_phone }}</td>
                                        <td>
                                            @if ($package->departure_id == $branch_id)
                                                <button type="button"
                                                    style="background-color: white; border-radius: 15px; border: 1px solid green; color: green">{{ $package->branch_departure->b_name }}</button>
                                            @else
                                                <button type="button"
                                                    style="background-color: white; border-radius: 15px; border: 1px solid purple; color: purple">{{ $package->branch_departure->b_name }}</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($package->destination_id == $branch_id)
                                                <button type="button"
                                                    style="background-color: white; border-radius: 15px; border: 1px solid green; color: green">{{ $package->branch_destination->b_name }}</button>
                                            @else
                                                <button type="button"
                                                    style="background-color: white; border-radius: 15px; border: 1px solid purple; color: purple">{{ $package->branch_destination->b_name }}</button>
                                            @endif
                                        </td>
                                        <td>{{ $package->weight }} kg</td>
                                        <td>{{ $package->delivery_charge }} $</td>
                                        <td>{{ $package->status }}</td>
                                        @if ($package->pay_status == 'Paid')
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
                                        @endif
                                        <td>
                                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST">

                                                <a class="btn btn-info btn-sm-rounded btn-sm waves-effect waves-light"
                                                    href="{{ route('packages.show', $package->id) }}">Show</a>

                                                <a class="btn btn-warning btn-sm-rounded btn-sm waves-effect waves-light"
                                                    href="{{ route('packages.edit', $package->id) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $packages->links() }} --}}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
