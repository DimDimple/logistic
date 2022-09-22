@extends('layouts.edit_pf')

@section('edit_pf')
    <div class="bar">
        <div class="title_list">
            <h3 style="color:#df9123;">Order List</h3>
        </div>
        <div class="box_search">
            <div class="search-box">
                <form>
                    <input type="text" name="" placeholder="Search">
                    <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                </form>
            </div>
        </div>
    </div>
    <div class="warpper_list">



        @foreach ($lists as $list)
            {{-- {{ $list['id']}} --}}

            <div class="box_card card2">

                <div class="card2_top">


                    <span class="title">{{ $list['branch_departure']['location']['province'] }}</span>
                        <i class="bi bi-arrow-right fa-lg"></i>
                    </span>

                    <span class="title">{{$list['branch_destination']['location']['province']  }}</span>



                </div>
                <div class="card2_bottom">
                    <div class="col1">
                        <div class="col1_top">
                            <p style="color: #959393;">Sender/Receiver</p>
                            <span><b>{{ $list['sender_phone'] }}</b></span>
                        </div>
                        <div class="col1_bottom">
                            <p><b>{{ $list['receiver_phone'] }}</b></p>

                            <div style="color: #959393;">
                                <i class="bi bi-box-seam"></i>
                                <span>{{ $list['goods'][0]['ptype']['package_type'] }}</span>
                            </div>

                        </div>
                    </div>
                    <div class="col2">
                        <p style="color: #959393;">Departure Date/Time</p>
                        <span><b>{{ date('d-m-Y', strtotime($list['created_at'])) }}</b></span><br><br>
                        <p><b>{{ date('h:i A', strtotime($list['created_at'])) }}</b></p>
                        <div class="color-text">
                            <i class="bi bi-ticket-perforated"></i>
                            <span>{{$list['goods'][0]['reference_number'] }}</span>
                        </div>

                    </div>
                    <div class="col3">
                        <p style="color: #959393;">Amount</b></p>
                        <span><b>{{ number_format($list['goods'][0]['fee'], 2) }}</b></span><br><br>
                        <p><b>USD</b></p>
                        <div class="color-text">
                            <i class="bi bi-coin"></i>
                            <span>{{ $list['pay_status'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
@endsection
