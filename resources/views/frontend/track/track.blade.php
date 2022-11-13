@extends('layouts.newapp')

@section('content')
    <div class="thumb track">
        <h2 style="margin: 10px; color: #fff">Dmgo Express</h2>
        <img src={{ asset('images/52460.jpg') }} alt="">

    </div>

    <div class="card_1 card-3" style="margin-top:-120px;">
        <h1><b>Track Your Package !</b></h1>
        <form class="col-md-8" action="{{ route('tracking') }}">
            <div class="container">
                <div class="search-box">
                    <input type="text" id="datatable-search-input" class="search-input" name="reference_number"
                        placeholder="Search reference number....." value="{{ $track }}">

                    <button class="search-button">
                        <i class='bx bx-search' style='color: #DE8F1F; margin-top:-1px'></i>
                    </button>
                </div>
            </div>
        </form>
    </div>



    <div class="container padding-bottom-3x mb-5" style="margin-top: 50px">

            @if ($not_exist == 1)
                <div class="card mb-3 p-3 bg-white ">
                    <div class="p-3 text-center text-black text-lg " style="background-color:#DE8F1F">
                        <span class="text-uppercase" style="font-size: 30px; font-weight:500" >Package Not Found</span>
                    </div>
                </div>
            @endif
        @foreach ($trackNumber as $trackNum)

            <div class="shadow-lg p-3 mb-5 bg-body rounded border border-warning">
                <div class="card mb-3 p-3 bg-white ">
                    <div class="p-3 text-center text-white text-lg " style="background-color:#DE8F1F"><span
                            class="text-uppercase">Tracking
                            No - </span><span class="text-medium">{{ $trackNum->reference_number }}</span></div>
                    <div class="row mt-3">
                        <div class="col md-3">
                            <h6 class="text-dark bg-secondary text-uppercase p-2 text-center">
                                Sender Information </h6>
                            <div class="mt-3" style="margin-left:15px">Sender Phone Number:
                                {{ $trackNum->sender_phone }}</div>
                            <div class="mt-3" style="margin-left:15px">Sender Email: {{ $trackNum->sender_email }}
                            </div>
                            <div class="mt-3" style="margin-left:15px">Current Branch:
                                {{ $trackNum->branch_departure->b_name }}</div>

                        </div>
                        <div class="col md-3">
                            <h6 class="text-dark bg-secondary text-uppercase p-2 text-center">Receiver Information</h6>
                            <div class="mt-3" style="margin-left:15px">Receiver Phone Number:
                                {{ $trackNum->receiver_phone }}</div>
                            <div class="mt-3" style="margin-left:15px">Receiver Email: {{ $trackNum->receiver_email }}
                            </div>
                            <div class="mt-3" style="margin-left:15px">Destination Branch:
                                {{ $trackNum->branch_departure->b_name }}</div>
                        </div>
                    </div>

                </div>
                <div class="card mb-3 p-3 bg-white ">
                    <div class="p-3 text-center text-white text-lg" style="background-color:#DE8F1F"><span
                            class="text-uppercase">Tracking History</div>
                    <div class="row mt-3">
                        <div class="col md-3">
                            <h6 class="text-dark bg-secondary text-uppercase p-2 text-center">
                                Date </h6>
                            <div class="mt-3 text-center"> {{ $trackNum->created_at->toDateString() }}</div>


                        </div>
                        <div class="col md-3">
                            <h6 class="text-dark bg-secondary text-uppercase p-2 text-center">Status</h6>
                            <div class="mt-3 text-center"> {{ $trackNum->status }}</div>

                        </div>
                    </div>

                </div>
            </div>
            {{-- <div
                class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
                <div class="custom-control custom-checkbox mr-3">
                    <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
                    <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
                </div>
                <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm"
                        href="{{ route('packages.show', $trackNum->id) }}">View Package Details</a></div>
            </div> --}}
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
