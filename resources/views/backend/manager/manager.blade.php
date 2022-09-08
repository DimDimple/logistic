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
                                <h5 class="font-size-15 text-uppercase mb-0">Goods</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                        <i class='bx bxs-package' style='color:#43f517'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $goodNumber }}</h3>
                            <p class="text-muted mb-0">Total Goods</p>
                        </a><!-- end card-body -->


                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body" >
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
                                <h5 class="font-size-15 text-uppercase mb-0">Processing</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                        <i class='bx bx-loader-circle' style='color:#07833a'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $countProcess }}</h3>
                            <p class="text-muted mb-0">Total Process</p>
                        </div><!-- end card-body -->


                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Shipped</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-danger font-size-20 mini-stat-icon">
                                        <i class='bx bxs-truck' style='color:#0b60f1'></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24 d-flex justify-content-center align-items-center"
                                style="font-weight: 900; font-size:30px">{{ $countShipped }}</h3>
                            <p class="text-muted mb-0">Total Shipped</p>
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
                    <div class="form-outline" style="width:20%; display:flex">
                        <input type="search" class="form-control" id="myInput" style=" margin-top:3%"
                            placeholder="Search">
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">
                        <thead>
                            <tr class="text-center">
                                <th>Reference Number</th>
                                <th>Sender Phone Number</th>
                                <th>Receiver Phone Number</th>
                                <th>Total Items</th>
                                <th>Total Fee</th>
                                <th>Status</th>
                                <th>Payment Status</th>

                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @csrf
                            @foreach ($packages as $package)
                                @if ($package->departure_id == $branch_id || $package->destination_id == $branch_id)
                                    <tr class="text-center">
                                        <td>{{ $package->reference_number }}</td>
                                        <td>{{ $package->sender_phone }}</td>
                                        <td>{{ $package->receiver_phone }}</td>
                                        <td>{{ $package->total_item }}</td>
                                        <td>{{ $package->total_fee }} $</td>

                                        <td>

                                            <select class="form-select" aria-label="Disabled select example"
                                                name="status" data-package-id="{{ $package->id }}">
                                                <option selected>{{ $package->status }}</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Decline">Decline</option>
                                                <option value="Completed">Completed</option>
                                            </select>

                                        </td>
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
