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
        {{-- card1 --}}
        {{-- <div class="box_card">
            <div class="left">
                <div class="ticket_header">
                    <h4>DMgo Express</h4>
                </div>
                <div class="bottom">
                    <table>
                        <tr>
                            <td class="text1">From</td>
                            <td colspan="3"><i class="bi bi-arrow-right fa-lg"></i></td>
                            <td class="text1">To</td>
                        </tr>
                        <tr>
                            <th>Phnom Penh</th>
                            <td colspan="3"></td>
                            <th>Kompong Soam</th>
                        </tr>
                        <tr>
                            <td class="text1">Date</td>
                            <td colspan="3"></td>
                            <td class="text1">Time</td>
                        </tr>
                        <tr>
                            <th>10-01-22</th>
                            <td colspan="3"></td>
                            <th>09:00 AM</th>
                        </tr>
                        <tr>
                            <th>1.25 USD</th>
                            <td colspan="3"></td>
                            <th>PAID</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="right">
                <div class="info">
                    <p>Sender</p>
                    <p style="color:black;">Mint Chocolate</p>
                </div>
                <div class="info">
                    <p>Reciever</p>
                    <p style="color:black;">Kevin</p>
                </div>

                <div class="info">
                    <p><i class="bi bi-ticket-perforated"></i>code 123</p>

                </div>
            </div>
        </div> --}}
        @foreach ($lists as $list)
            {{-- @if ($list->package->sender_phone == $user_phone || $list->package->receiver_phone == $user_phone) --}}
            <div class="box_card card2">

                <div class="card2_top">
                    @foreach ($branches as $branch)

                        @if ($branch->id == $list->departure_id)
                            <span class="title">{{ $branch->province }}
                                <i class="bi bi-arrow-right fa-lg"></i></></span>
                        @elseif ($branch->id == $list->destination_id)
                            <span class="title">{{ $branch->province }}</></span>
                        @endif

                    @endforeach

                </div>
                <div class="card2_bottom">
                    <div class="col1">
                        <div class="col1_top">
                            <p style="color: #959393;"><b></b>Sender/Receiver</b></p>
                            <span><b>{{ $list->sender_phone }}</b></span>
                        </div>
                        <div class="col1_bottom">
                            {{-- <p style="color: #959393;"><b>Receiver</b></p> --}}
                            <p><b>{{ $list->receiver_phone }}</b></p>

                            <div style="color: #959393;">
                                <i class="bi bi-box-seam"></i>
                                <span>{{ $list->package_type }}</span>
                            </div>

                        </div>
                    </div>
                    <div class="col2">
                        <p style="color: #959393;">Departure Date/Time</p>
                        <span><b>{{ date('d-m-Y', strtotime($list->created_at)) }}</b></span><br><br>
                        <p><b>{{ date('h:i A', strtotime($list->created_at)) }}</b></p>
                        <div class="color-text">
                            <i class="bi bi-ticket-perforated"></i>
                            <span>asdg3gs</span>
                        </div>

                    </div>
                    <div class="col3">
                        <p style="color: #959393;">Amount</b></p>
                        <span><b>{{ number_format($list->fee, 2) }}</b></span><br><br>
                        <p><b>USD</b></p>
                        <div class="color-text">
                            <i class="bi bi-coin"></i>
                            <span>{{ $list->pay_status }}</span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
        @endforeach

    </div>
@endsection
