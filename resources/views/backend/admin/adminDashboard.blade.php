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
                                <h5 class="font-size-15 text-uppercase mb-0">Income</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                        <i class="ri-wallet-3-line text-success"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">46,562
                                <span class="text-danger fw-normal font-size-14 ms-2">+3.16%</span>
                            </h3>
                            <p class="text-muted mb-0">Total income </p>
                        </div><!-- end card-body -->

                        <!-- user chart -->
                        <div id="user-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-xl-4">
                    <div class="card overflow-hidden card-h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-size-15 text-uppercase mb-0">Orders</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-danger font-size-20 mini-stat-icon">
                                        <i class="ri-shopping-cart-line text-danger"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">2048<span class="text-danger fw-normal font-size-14 ms-2">+3.16%</span>
                            </h3>
                            <p class="text-muted mb-0">Total Users World wide</p>
                        </div><!-- end card-body -->

                        <!-- order chart -->
                        <div id="order-chart"></div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->

        <div class="col-xl-4">
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
        </div><!-- end col-->
    </div><!-- end row-->

    


    <!-- end row -->


    <!-- End Page-content -->
@endsection
