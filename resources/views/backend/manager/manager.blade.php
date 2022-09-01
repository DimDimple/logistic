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

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">                        
                        <a href="http://dmgo.express/informationUser">form</a>
                    </ol>
                </div>

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
                                <h5 class="font-size-15 text-uppercase mb-0">Packages</h5>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                        <i class="ri-user-line text-primary"></i>
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-size-24" style="margin-left:80px">{{ $packages }} </h3>
                            <p class="text-muted mb-0">Total Packages</p>
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

      
    </div><!-- end row-->

  



    <!-- end row -->


    <!-- End Page-content -->
@endsection
