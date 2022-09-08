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
            <div>
                <div style="display:flex; margin-top: 10px">
    
                    <div class="shadow-lg p-3 mb-5 bg-white rounded" style=" width:1400px"><strong style="font-size: 20px;"
                            class="d-flex align-items-center justify-content-center">SHIPMENT TRACK</strong>
                        <div style="display:flex;justify-content:center;align-items:center;flex-direction:column;" >
                            <div style="margin-top:20px;display:flex;width:1200px">
                                <div style="width: 250px">
                                    <h5 class="card-title text-primary" style="margin-left:100px">Sender Phone</h5>
                                    <p class="card-title text-dark text-center" >hello</p>
                                    {{-- {{ $employee->gender }} --}}
                                </div>
                                <div style="width: 250px; margin-left:100px">
                                    <h5 class="card-title text-success">Receiver Phone</h5>
                                    <p class="card-title text-dark">hello</p>
                                </div>
                                <div style="width: 250px; margin-left:100px">
                                    <h5 class="card-title text-info">Departure</h5>
                                    {{-- {{ $employee->type->type }} --}}
                                    <p class="card-title text-dark">hello</p>
                                </div>
                                <div style="width: 250px; margin-left:50px">
                                    <h5 class="card-title text-warning">Destination</h5>
                                    {{-- {{ $employee->phone }} --}}
                                    <p class="card-title text-dark">hello</p>
                                </div>
                            </div>
                            <div class="header-u" style="margin-top:20px;display:flex">
                               
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
@endsection
