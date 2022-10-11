@extends('backend.manager.layouts.dashboard')
@section('content')
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard</h4>
                <h4 class="mb-0">{{ $currentBranch }}</h4>
                <i class='bx bx-calendar-week' style="margin-right:10%"></i>
                <span id="time" style="position:absolute; margin-left:89%"></span>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="row h-100">
                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <a class="card-body" href="{{ route('packages.index') }}">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Packages</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class='bx bx-package' style='color:#8813b7'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $packageNumber }} </h3>
                            <p class="text-muted mb-0">Total Packages</p>
                        </a><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <a class="card-body" href="{{ route('packages.index') }}">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Delivery Charge</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                      
                                        <i class='bx bx-money-withdraw' undefined style='color:#43f517'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $totalDeliveryCharge }}</h3>
                            <p class="text-muted mb-0">Total delivery charges</p>
                        </a><!-- end card-body -->


                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Status</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-danger font-size-20 mini-stat-icon">
                                        <i class='bx bx-check-circle' style='color:#e22b07'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">4</h3>
                            <p class="text-muted mb-0">Total Status</p>
                        </div><!-- end card-body -->


                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <a class="card-body" href="{{ route('employeebranch.index') }}">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">employee</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class='bx bxs-group' style='color:#9714e2'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $countEmployees }}</h3>
                            <p class="text-muted mb-0">Total Employees</p>
                        </a><!-- end card-body -->

                    </div><!-- end card -->
                </div><!-- end col-->
            </div><!-- end row -->
        </div><!-- end col -->

        <div class="col-xl-12">
            <div class="row h-100">
                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Pending</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class='bx bx-loader-alt' style='color:#8813b7'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $countPending }} </h3>
                            <p class="text-muted mb-0">Total Pending</p>
                        </div><!-- end card-body -->



                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Shipped</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                        <i class='bx bxs-truck' style='color:#0b60f1'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $countShipped }}</h3>
                            <p class="text-muted mb-0">Total Shipped</p>
                        </div><!-- end card-body -->


                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Received</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-danger font-size-20 mini-stat-icon">

                                        <i class='bx bx-clipboard' style='color:#0b60f1'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $countReceived }}</h3>
                            <p class="text-muted mb-0">Total Received</p>
                        </div><!-- end card-body -->


                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Completed</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class='bx bx-check-shield' style='color:#8813b7'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $countCompleted }}</h3>
                            <p class="text-muted mb-0">Total Completed</p>
                        </div><!-- end card-body -->

                    </div><!-- end card -->
                </div><!-- end col-->
            </div><!-- end row -->
        </div><!-- end col -->
    </div><!-- end row-->
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
                    {{-- <div class="form-outline" style="width:20%; display:flex">
                        <input type="search" class="form-control" id="myInput" style=" margin-top:3%"
                            placeholder="Search">
                    </div> --}}

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
