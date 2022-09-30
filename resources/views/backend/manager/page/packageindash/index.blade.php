@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Package</h4>
                <i class='bx bx-calendar-week' style="margin-right:60%"></i>
                <span id="time" style=" position:absolute; margin-left:40%"></span>
            </div>
            <a href="{{ route('package.export') }}">
                <button type="button" class="btn btn-secondary" style="margin-left: 90%;margin-top:-3%">Export
                    Excel</button>
            </a>

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

                    <table id="myTable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">
                        <thead>
                            <tr>

                                <th>Tracking No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Sender Detail</th>
                                <th>Receiver Detail</th>
                                <th>Shipment Detail</th>
                                <th>Payments</th>
                                <th>Payment Status</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @foreach ($packages as $key => $package)
                                @if ($package->departure_id == $branch_id || $package->destination_id == $branch_id)
                                    <tr>


                                        <td>{{ $package->reference_number }}</td>
                                        <td>{{ $package->created_at->toDateString() }}</td>
                                        <td> {{ Carbon\Carbon::parse($package->time)->format('h:m:a') }}</td>
                                        <td>Phone: {{ $package->sender_phone }}
                                            <div>Email: {{ $package->sender_email }}</div>
                                        </td>
                                        <td>Phone: {{ $package->receiver_phone }}
                                            <div>Email: {{ $package->receiver_email }}</div>
                                        </td>
                                        <td>Current Branch: {{ $package->branch_departure->b_name }}
                                            <div>Destination Branch: {{ $package->branch_destination->b_name }}</div>
                                            <div>Package Price: {{ $package->package_price }} $</div>
                                            <div>Package Type: {{ $package->ptype->package_type }}</div>
                                            <div>Weight: {{ $package->weight }} (kg)</div>
                                            <div>Product Description: {{ $package->product_description }}</div>
                                            <div>Special Instruction: {{ $package->special_instruction }}</div>
                                        </td>
                                        <td>{{ $package->delivery_charge }} $</td>
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
                                        <td>{{ $package->status }}</td>

                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

   
@endsection
