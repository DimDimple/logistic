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

                <div class="col-md-8">
                    <div class="form-outline" style="width:100%; display:flex">
                        <input type="search" class="form-control" id="datatable-search-input" style="margin-left:10%"
                            placeholder="Search  ......">
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                <div class="row justify-content-between">
                    <div class="order-tracking completed">
                        <span class="is-complete"></span>
                        <p>Pending<br><span>Mon, June 24</span></p>
                    </div>
                    <div class="order-tracking completed">
                        <span class="is-complete"></span>
                        <p>Processing<br><span>Tue, June 25</span></p>
                    </div>
                    <div class="order-tracking completed">
                        <span class="is-complete"></span>
                        <p>Shipped<br><span>Tue, June 25</span></p>
                    </div>
                    <div class="order-tracking">
                        <span class="is-complete"></span>
                        <p>Completed<br><span>Fri, June 28</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hh-grayBox {
            background-color: #F8F8F8;
            margin-bottom: 20px;
            padding: 35px;
            margin-top: 20px;
            width: 1200px;
        }

        .pt45 {
            padding-top: 45px;
        }

        .order-tracking {
            text-align: center;
            width: 25%;
            position: relative;
            display: block;
        }

        .order-tracking .is-complete {
            display: block;
            position: relative;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            border: 0px solid #AFAFAF;
            background-color: #f7be16;
            margin: 0 auto;
            transition: background 0.25s linear;
            -webkit-transition: background 0.25s linear;
            z-index: 2;
        }

        .order-tracking .is-complete:after {
            display: block;
            position: absolute;
            content: '';
            height: 14px;
            width: 7px;
            top: -2px;
            bottom: 0;
            left: 5px;
            margin: auto 0;
            border: 0px solid #AFAFAF;
            border-width: 0px 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
        }

        .order-tracking.completed .is-complete {
            border-color: #27aa80;
            border-width: 0px;
            background-color: #27aa80;
        }

        .order-tracking.completed .is-complete:after {
            border-color: #fff;
            border-width: 0px 3px 3px 0;
            width: 7px;
            left: 11px;
            opacity: 1;
        }

        .order-tracking p {
            color: #A4A4A4;
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 0;
            line-height: 20px;
        }

        .order-tracking p span {
            font-size: 14px;
        }

        .order-tracking.completed p {
            color: #000;
        }

        .order-tracking::before {
            content: '';
            display: block;
            height: 3px;
            width: calc(100% - 40px);
            background-color: #f7be16;
            top: 13px;
            position: absolute;
            left: calc(-50% + 20px);
            z-index: 0;
        }

        .order-tracking:first-child:before {
            display: none;
        }

        .order-tracking.completed:before {
            background-color: #27aa80;
        }
    </style>
@endsection
