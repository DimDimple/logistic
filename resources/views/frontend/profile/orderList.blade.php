@extends('layouts.edit_pf')


@section('edit_pf')
    <div class="wrap_over">
        <div class="bar_wrapper">
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
        </div>
        <div class="container-1">
            <div class="order_sidebar">
                <a href="/orderlist">
                    <div class="sidebar_btn btn {{ $btnClicked == 'all'? 'active' : '' }}" id="btn1" onclick="myFunction('btn1')">
                        <div>
                            All Orders
                        </div>
                    </div>
                </a>

                <div class="border_line"></div>
                <a href="/orderlist/process">
                    <div class="sidebar_btn btn  {{ $btnClicked == 'process'? 'active' : '' }}"id="btn2" onclick="myFunction('btn2')">
                        <div>
                            On Process
                        </div>
                    </div>
                </a>
                <div class="border_line"></div>
                <a href="/orderlist/completed">
                    <div class="sidebar_btn btn {{ $btnClicked == 'completed'? 'active' : '' }}" id="btn3" onclick="myFunction('btn3')">
                        <div>
                            Completed
                        </div>
                    </div>
                </a>


            </div>
            <div class="list-order-container">

                <div class="item">
                    @if ($lists)
                        <div class="order_container">
                            @foreach ($lists as $list)
                                <div class="item-container">
                                    <div class="item">
                                        <div class="warpper_list">

                                            <div class="box_card card2">

                                                <div class="card2_top">
                                                    <div>
                                                        <span
                                                            class="title">{{ $list['branch_departure']['location']['province'] }}</span>
                                                        <i class="bi bi-arrow-right fa-lg"></i>
                                                        </span>
                                                        <span
                                                            class="title">{{ $list['branch_destination']['location']['province'] }}</span>
                                                    </div>
                                                    <div>
                                                        @if ($list['status'] == 'Pending')
                                                            <span class="badge pill bg-primary text-white"
                                                                style="font-size:1rem">
                                                                {{ $list['status'] }}
                                                            </span>
                                                        @elseif($list['status'] == 'Shipped')
                                                            <span class="badge pill bg-warning text-white"
                                                                style="font-size:1rem">
                                                                {{ $list['status'] }}
                                                            </span>
                                                        @elseif($list['status'] == 'Received')
                                                            <span class="badge pill bg-info text-white"
                                                                style="font-size:1rem">
                                                                {{ $list['status'] }}
                                                            </span>
                                                        @elseif($list['status'] == 'Completed')
                                                            <span class="badge pill bg-success text-light"
                                                                style="font-size:1rem">
                                                                {{ $list['status'] }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="card2_bottom">

                                                    <div class="col1">
                                                        <p style="color: #959393;">Sender/Receiver</p>
                                                        <span><b>{{ $list['sender_phone'] }}</b></span><br><br>
                                                        <p><b>{{ $list['receiver_phone'] }}</b></p>
                                                        <div style="color: #959393;">
                                                            <i class="bi bi-box-seam"></i>
                                                            <span> {{ $list['ptype']['package_type'] }}</span>
                                                        </div>

                                                    </div>
                                                    <div class="col2">
                                                        <p style="color: #959393;">Departure Date/Time</p>
                                                        <span><b>{{ date('d-m-Y', strtotime($list['created_at'])) }}</b></span><br><br>
                                                        <p><b>{{ date('h:i A', strtotime($list['created_at'])) }}</b></p>
                                                        <div class="color-text">
                                                            <i class="bi bi-ticket-perforated"></i>
                                                            <span>{{ $list['reference_number'] }}</span>
                                                        </div>

                                                    </div>
                                                    <div class="col3">
                                                        <p style="color: #959393;">Amount</b></p>
                                                        <span><b>{{ number_format($list['delivery_charge'], 2) }}</b></span><br><br>
                                                        <p><b>USD</b></p>
                                                        <div class="color-text">
                                                            <i class="bi bi-coin"></i>
                                                            <span>{{ $list['pay_status'] }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div>
                            No Order Information
                        </div>
                    @endif

                </div>

            </div>
        </div>


    @endsection



    <script>
        function myFunction(id) {
            const e = document.getElementsByClassName('sidebar_btn');
            for (let i = 0; i < e.length; i++) {
                e[i].style.color = "black";
            }
            const element = document.getElementById(id);
            element.style.color = "#df9123";
        }
    </script>
