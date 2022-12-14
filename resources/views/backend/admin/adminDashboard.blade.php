@extends('backend.admin.layouts.index')
@section('content')
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Admin Dashboard</h4>

                {{-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="http://dmgo.express/informationUser">form</a>
                    </ol>
                </div> --}}
                <i class='bx bx-calendar-week' style="margin-right:20%"></i>
                <span id="time" style="position:absolute; margin-left:80%"></span>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-8">
            <div class="row h-100">
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Admins</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class="bx bxs-group text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">{{ $totalAdmin }}</h3>
                            <p class="text-muted mb-0">Total Admins</p>
                        </div><!-- end card-body -->

                        <!-- Project chart -->
                        <div id="project-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col-->
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Managers</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class="bx bxs-group text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">{{ $totalManager }}</h3>
                            <p class="text-muted mb-0">Total Managers </p>
                        </div><!-- end card-body -->

                        <!-- Project chart -->
                        <div id="project-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Customers</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class="bx bxs-group text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">{{ $totalUser }} </h3>
                            <p class="text-muted mb-0">Total Users login to website</p>
                        </div><!-- end card-body -->

                        <!-- Project chart -->
                        <div id="project-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Total Branches</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                        <i class='bx bxs-group' ></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">{{ $totalBranches }}
                                {{-- <span class="text-danger fw-normal font-size-14 ms-2">+3.16%</span> --}}
                            </h3>
                            <p class="text-muted mb-0">Total Branches </p>
                        </div><!-- end card-body -->

                        <!-- user chart -->
                        <div id="user-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col-->
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Total Fee</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                        <i class="ri-wallet-3-line text-success"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">{{ $totalDeliveryCharge }}
                                {{-- <span class="text-danger fw-normal font-size-14 ms-2">+3.16%</span> --}}
                            </h3>
                            <p class="text-muted mb-0">Total Delivery Charges</p>
                        </div><!-- end card-body -->

                        <!-- user chart -->
                        <div id="user-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-xl-4">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0"> Total Packages</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-danger font-size-20 mini-stat-icon">
                                        <i class="ri-shopping-cart-line text-danger"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">{{ $totalPackages }}
                                {{-- <span class="text-danger fw-normal font-size-14 ms-2">+3.16%</span> --}}
                            </h3>
                            <p class="text-muted mb-0">Total packages</p>
                        </div><!-- end card-body -->

                        <!-- order chart -->
                        <div id="order-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->

        {{-- <div class="col-xl-4">
            <div class="card congo-widget overflow-hidden">
                <div class="card-body">
                    <div class="row align-items-center">

                        <div class="col-8">
                            <div>
                                <h4 class="font-size-24 text-white text-truncate">Best Employee Shonen
                                </h4>
                                <p class="text-white-50 mt-3">Thanks For begin such in our Medroc. You
                                    have done <b class="text-white">57.6%</b> more sales today</p>
                                <h1 class="text-white mt-3 mb-0">4.3k</h1>
                            </div>
                        </div>

                        <div class="col-4">
                            <div>
                                <img src="assets/images/sales-img-2.png" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col--> --}}
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Branch Status</h4>
                    <div class="mt-3">
                        <div id="sales-reports" class="apex-carts"></div>
                    </div>

                    <div class="row mt-1">
                        <div class="col border-end">
                            <div class="text-center py-2">
                                <p class="text-uppercase mb-0 text-muted"><i
                                        class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>Online
                                    Branch
                                </p>
                                <h4 class="mt-2 mb-0">3</h4>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="text-center py-2">
                                <p class="text-uppercase mb-0 text-muted"><i
                                        class="mdi mdi-circle align-middle font-size-10 me-2 text-danger"></i>Offline
                                    Branch
                                </p>
                                <h4 class="mt-2 mb-0">1</h4>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card-body -->
            </div><!-- end card -->

        </div><!-- end col -->

        {{-- <div class="row">
            <div class="col-xl-8">

            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sales Reports</h4>
                        <div class="mt-3">
                            <div id="sales-reports" class="apex-carts"></div>
                        </div>

                        <div class="row mt-1">
                            <div class="col border-end">
                                <div class="text-center py-2">
                                    <p class="text-uppercase mb-0 text-muted"><i
                                            class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>Online
                                        Sales
                                    </p>
                                    <h4 class="mt-2 mb-0">65M</h4>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="text-center py-2">
                                    <p class="text-uppercase mb-0 text-muted"><i
                                            class="mdi mdi-circle align-middle font-size-10 me-2 text-danger"></i>Offline
                                        Sales
                                    </p>
                                    <h4 class="mt-2 mb-0">125K</h4>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->

            </div><!-- end col -->
        </div><!-- end row --> --}}

    </div><!-- end row-->


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">List Branch</h1>
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

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- end row -->


    <!-- End Page-content -->
@endsection
