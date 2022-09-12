@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Track</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="http://dmgo.express/manager/packages">Record</a>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">Tracking Your Package</h2>
            <div class="row height d-flex justify-content-center align-items-center">

                <form class="col-md-8" action="{{ route('track') }}">
                    <div class="form-outline" style="width:100%; display:flex">
                        <input type="text" class="form-control" id="datatable-search-input" name="reference_number"
                            style="margin-left:10%" placeholder="Search Tracking Number.........">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <div class="container padding-bottom-3x mb-1">
        @foreach ($trackNumber as $trackNum)
            <div class="card mb-3 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking
                        Order
                        No - </span><span class="text-medium">{{ $trackNum->reference_number }}</span></div>
                <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                    <div class="w-100 text-center py-1 px-2"><span class="text-medium">Package Price:</span>
                        <p class="text-primary">{{ $trackNum->package_price }}</p>
                    </div>
                    <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span>
                        <p class="text-danger">{{ $trackNum->status }}</p>
                    </div>
                    <div class="w-100 text-center py-1 px-2"><span class="text-medium">Accepted Date:</span>
                        {{ $trackNum->created_at->toDateString() }}
                    </div>

                </div>
                <div class="card-body">
                    <!--Status = pending-->
                    @if($trackNum->status == 'Pending')
                    <div
                        class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                        <div class="step completed" >
                            <div class="step-icon-wrap">
                                <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"> <i
                                        class='bx bx-loader-alt' style='color:#8813b7'></i></div>
                            </div>
                            <h4 class="step-title">Pending</h4>
                        </div>
                        <div class="step">
                            <div class="step-icon-wrap">
                                <div class="step-icon" style="border-color: #0d6efd; background-color"><i
                                        class='bx bx-loader-circle' style='color:#07833a'></i></div>
                            </div>
                            <h4 class="step-title">Processing</h4>
                        </div>
                        <div class="step">
                            <div class="step-icon-wrap">
                                <div class="step-icon" style="border-color: #0d6efd; background-color:"><i
                                        class='bx bxs-truck' style='color:#0b60f1'></i></div>
                            </div>
                            <h4 class="step-title">Shipped</h4>
                        </div>
                        <div class="step">
                            <div class="step-icon-wrap">
                                <div class="step-icon" style="border-color: #0d6efd; background-color:"> <i
                                        class='bx bx-check-shield' style='color:#8813b7'></i></div>
                            </div>
                            <h4 class="step-title">Completed</h4>
                        </div>
                    </div>
                    @endif
                    @if ($trackNum->status == 'Processing')
                    <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                    <div class="step completed" >
                        <div class="step-icon-wrap">
                            <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"> <i
                                    class='bx bx-loader-alt' style='color:#8813b7'></i></div>
                        </div>
                        <h4 class="step-title">Pending</h4>
                    </div>
                    <div class="step completed">
                        <div class="step-icon-wrap">
                            <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"><i
                                    class='bx bx-loader-circle' style='color:#07833a'></i></div>
                        </div>
                        <h4 class="step-title">Processing</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon" style="border-color: #0d6efd; background-color:"><i
                                    class='bx bxs-truck' style='color:#0b60f1'></i></div>
                        </div>
                        <h4 class="step-title">Shipped</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon-wrap">
                            <div class="step-icon" style="border-color: #0d6efd; background-color:"> <i
                                    class='bx bx-check-shield' style='color:#8813b7'></i></div>
                        </div>
                        <h4 class="step-title">Completed</h4>
                    </div>
                </div>
                    @endif
                @if ($trackNum->status == 'Shipped')
                <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                <div class="step completed" >
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"> <i
                                class='bx bx-loader-alt' style='color:#8813b7'></i></div>
                    </div>
                    <h4 class="step-title">Pending</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"><i
                                class='bx bx-loader-circle' style='color:#07833a'></i></div>
                    </div>
                    <h4 class="step-title">Processing</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"><i
                                class='bx bxs-truck' style='color:#0b60f1'></i></div>
                    </div>
                    <h4 class="step-title">Shipped</h4>
                </div>
                <div class="step">
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:"> <i
                                class='bx bx-check-shield' style='color:#8813b7'></i></div>
                    </div>
                    <h4 class="step-title">Completed</h4>
                </div>
            </div>
                @endif
                @if ($trackNum->status == 'Completed')
                <div
                class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                <div class="step completed" >
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"> <i
                                class='bx bx-loader-alt' style='color:#8813b7'></i></div>
                    </div>
                    <h4 class="step-title">Pending</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"><i
                                class='bx bx-loader-circle' style='color:#07833a'></i></div>
                    </div>
                    <h4 class="step-title">Processing</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"><i
                                class='bx bxs-truck' style='color:#0b60f1'></i></div>
                    </div>
                    <h4 class="step-title">Shipped</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon" style="border-color: #0d6efd; background-color:#ffc107"> <i
                                class='bx bx-check-shield' style='color:#8813b7'></i></div>
                    </div>
                    <h4 class="step-title">Completed</h4>
                </div>
            </div>
                @endif

                </div>
            </div>
            <div
                class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
                <div class="custom-control custom-checkbox mr-3">
                    <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
                    <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
                </div>
                <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="#"
                        data-toggle="modal" data-target="#orderDetails">View Order Details</a></div>
            </div>
        @endforeach
    </div>

    <style>
        body {
            margin-top: 20px;
        }

        .steps .step {
            display: block;
            width: 100%;
            margin-bottom: 35px;
            text-align: center
        }

        .steps .step .step-icon-wrap {
            display: block;
            position: relative;
            width: 100%;
            height: 80px;
            text-align: center
        }

        .steps .step .step-icon-wrap::before,
        .steps .step .step-icon-wrap::after {
            display: block;
            position: absolute;
            top: 50%;
            width: 50%;
            height: 3px;
            margin-top: -1px;
            background-color: #e1e7ec;
            content: '';
            z-index: 1
        }

        .steps .step .step-icon-wrap::before {
            left: 0
        }

        .steps .step .step-icon-wrap::after {
            right: 0
        }

        .steps .step .step-icon {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            border: 1px solid #e1e7ec;
            border-radius: 50%;
            background-color: #f5f5f5;
            color: #374250;
            font-size: 35px;
            line-height: 81px;
            z-index: 5;

        }

        .steps .step .step-title {
            margin-top: 16px;
            margin-bottom: 10px;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .steps .step:first-child .step-icon-wrap::before {
            display: none
        }

        .steps .step:last-child .step-icon-wrap::after {
            display: none
        }

        .steps .step.completed .step-icon-wrap::before,
        .steps .step.completed .step-icon-wrap::after {
            background-color: #ffc107
        }

        .steps .step.completed .step-icon {

            color: #fff
        }

        @media (max-width: 576px) {

            .flex-sm-nowrap .step .step-icon-wrap::before,
            .flex-sm-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 768px) {

            .flex-md-nowrap .step .step-icon-wrap::before,
            .flex-md-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 991px) {

            .flex-lg-nowrap .step .step-icon-wrap::before,
            .flex-lg-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 1200px) {

            .flex-xl-nowrap .step .step-icon-wrap::before,
            .flex-xl-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        .bg-faded,
        .bg-secondary {
            background-color: #f5f5f5 !important;
        }
    </style>
@endsection
