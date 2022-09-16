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
                <i class='bx bx-calendar-week' style="margin-right:10%"></i>
                <span id="time" style="position:absolute; margin-left:89%"></span>
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
                            <h3 class="font-size-24">{{ $totalAdmin }}<span
                                    class="text-success fw-normal font-size-14 ms-2">+8.34%</span></h3>
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
                            <h3 class="font-size-24">{{ $totalManager }}<span
                                    class="text-success fw-normal font-size-14 ms-2">+8.34%</span></h3>
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
                            <h3 class="font-size-24">{{ $totalUser }} <span
                                    class="text-success fw-normal font-size-14 ms-2">+8.34%</span></h3>
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
                                <h5 class="font-size-15 text-uppercase mb-0">Profit</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-success font-size-20 mini-stat-icon">
                                        <i class="ri-wallet-3-line text-success"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24">46,562
                                <span class="text-danger fw-normal font-size-14 ms-2">+3.16%</span>
                            </h3>
                            <p class="text-muted mb-0">Total Users World wide</p>
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

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sales Analytics</h4>

                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div id="analytics-chart" class="apex-charts"></div>
                        </div><!-- end col -->

                        <div class="col-xl-4">
                            <h3 class="mt-2">$3,536.65</h3>
                            <p class="text-muted">Curabitur lacinia eleifend justo eget
                                lobortis ipsum feugiat ornare.
                            </p>
                            <div class="mt-3">
                                <div class="border-bottom py-3">
                                    <div class="d-flex align-items-center">
                                        <div id="mini-1" class="apex-charts"></div>
                                        <div class="flex-grow-1 ms-2">
                                            <h4 class="mb-1 font-size-17">24,523</h4>
                                            <span class="text-muted font-size-14">Total User</span>
                                        </div>

                                        <div class="flex-shrink-0 text-end">
                                            <span
                                                class="badge rounded-pill badge-soft-success font-size-12 fw-medium mb-1"><i
                                                    class="mdi mdi-arrow-up-bold me-2"></i>2.65%</span>
                                            <p class="text-muted font-size-14 mb-0">June 2021</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom py-3">
                                    <div class="d-flex align-items-center">
                                        <div id="mini-2" class="apex-charts"></div>
                                        <div class="flex-grow-1 ms-2">
                                            <h4 class="mb-1 font-size-17">235M</h4>
                                            <span class="text-muted font-size-14">Avarage sale</span>
                                        </div>

                                        <div class="flex-shrink-0 text-end">
                                            <span
                                                class="badge rounded-pill badge-soft-success font-size-12 fw-medium mb-1"><i
                                                    class="mdi mdi-arrow-up-bold me-2"></i>350k</span>
                                            <p class="text-muted font-size-14 mb-0">June 2021</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div id="mini-3" class="apex-charts"></div>
                                        <div class="flex-grow-1 ms-1">
                                            <h4 class="mb-1 font-size-17">7,854</h4>
                                            <span class="text-muted font-size-14">Annual income</span>
                                        </div>

                                        <div class="flex-shrink-0 text-end">
                                            <span
                                                class="badge rounded-pill badge-soft-danger font-size-12 fw-medium mb-1"><i
                                                    class="mdi mdi-arrow-down-bold me-2"></i>$38,580</span>
                                            <p class="text-muted font-size-14 mb-0">June 2021</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card-body -->
            </div><!-- end card -->
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
    </div><!-- end row -->



    <!-- end row -->


    <!-- End Page-content -->
@endsection
