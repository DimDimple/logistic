@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Package Information</h4>
            </div>
        </div>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-white rounded text-primary" style="font-size: 20px"><strong>Tracking Number:</strong>
        <div style="margin-left:10%">{{ $package->id }}</div>
    </div>
    <div style="display:flex; margin-top: 10px">

        <div class="shadow-lg p-3 mb-5 bg-white rounded" style=" width:50%"><strong style="font-size: 20px;">Sender
                Information</strong>
            <div class="header-u" style="margin-top:20px;display:flex">
                <div style="width: 50%">
                    <h5 class="card-title">Sender Phone Number</h5>
                    {{ $package->sender_phone }}
                </div>
                <div style="width: 50%; margin-left:20px">
                    <h5 class="card-title">Receiver Phone Number</h5>
                    {{ $package->receiver_phone }}
                </div>
            </div>
            <div class="header-u" style="margin-top:20px;display:flex">
                <div style="width: 50%">
                    <h5 class="card-title text-warning">Departure</h5>
                    {{ $branch->b_name }}
                </div>
                <div style="width: 50%; margin-left:20px">
                    <h5 class="card-title text-danger">Destination</h5>
                    {{ $branchOne->b_name }}
                </div>
            </div>

        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded" style=" width:85%; margin-left:20px"><strong
                style="font-size: 20px;">Package
                Information</strong>
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:3%">
                <thead>
                    <tr class="text-center">

                        <th>ID</th>
                        <th>Package Price</th>
                        <th>Package Type</th>
                        <th>Quantity</th>
                        <th>Fee</th>
                        <th>Messages</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($goods as $key => $good)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $good->package_price }}</td>
                            <td>{{ $package_type->package_type }}</td>
                            <td>{{ $good->quantity }}</td>
                            <td>{{ $good->fee }} $</td>
                            <td>{{ $good->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="text-center" style="margin-top:20px;display:flex">
            <div style="width: 50%">
                <h5 class="card-title p-3 mb-2 bg-success text-white">STATUS</h5>
               <h6 class="text-center"> {{ $package->status }}</h6>
            </div>
            <div style="width: 50%; margin-left:20px">
                <h5 class="card-title p-3 mb-2 bg-warning text-dark">PAYMENT STATUS</h5>
               <h6 class="text-center"> {{ $package->pay_status }}</h6>
            </div>


            <div style="width: 50%; margin-left:20px">
                <h5 class="card-title p-3 mb-2 bg-primary text-white">TOTAL ITEMS</h5>
                <h6 class="text-center">{{ $package->total_item }}</h6>

            </div>
            <div style="width: 50%; margin-left:20px">
                <h5 class="card-title p-3 mb-2 bg-info text-white">TOTAL FEE</h5>
               <h6 class="text-center"> {{ $package->total_fee }} $</h6>
            </div>
        </div>



    </div>
@endsection
