@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">List all Goods</h4>
                <i class='bx bx-calendar-week' style="margin-right:60%"></i>
                <span id="time" style=" position:absolute; margin-left:40%"></span>
            </div>
            <a href="#">
                <button type="button" class="btn btn-secondary" style="margin-left: 90%;margin-top:-3%">Export
                    Excel</button>
            </a>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">List Package</h1>
                    {{-- <div class="alert text-dark" style="height:25px">
                    <p id="message"></p>
                </div> --}}

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
                                <th>Package ID</th>
                                <th>Reference Number</th>
                                <th>Package Price</th>
                                <th>Package Type</th>
                                <th>Fee</th>
                                <th>Messages</th>
                                <th>Status</th>
                              
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @csrf
                            @foreach ($goods as $goodData)
                            <!--two dimension array-->
                                @foreach ($goodData as $good)
                                    <tr class="text-center">
                                        <td>{{ $good->package_id }}</td>
                                        <td>{{ $good->reference_number }}</td>
                                        <td>{{ $good->package_price }} $</td>
                                        <td>{{ $good->ptype->package_type }}</td>
                                        <td>{{ $good->fee }} $</td>
                                        <td>{{ $good->message }}</td>
                                        <td>{{ $good->status }}</td>
                                        
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
