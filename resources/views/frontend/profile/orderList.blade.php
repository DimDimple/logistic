@extends('layouts.edit_pf')

@section('edit_pf')
    <div class="bar">
        <div class="title_list">
            <h3>Order List</h3>
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
        <div class="box_card card2">

            <div class="card2_top">

                <h5>Phnom Penh <i class="bi bi-arrow-right fa-lg"></i> Kampot</h5>


            </div>
            <div class="card2_bottom">
                <div class="col1">
                    <div class="col1_top">
                        <p><b>Sender</b></p>
                        <span>012 234 234</span>
                    </div>
                    <div class="col1_bottom">
                        <p><b>Receiver</b></p>
                        <span>012 234 234</span>
                    </div>
                </div>
                <div class="col2">
                    <p><b>Departure Date/Time</b></p>
                    <span>10-01-22</span><br><br>
                    <p>09:00 AM</p>
                    <div class="color-text">
                        <i class="bi bi-ticket-perforated"></i>
                        <span>asdg3gs</span>
                    </div>

                </div>
                <div class="col3">
                    <p><b>Amount</b></p>
                    <span>1.25</span><br><br>
                    <p>USD</p>
                    <span class="color-text">Paid</span>
                </div>
            </div>
        </div>

    </div>
@endsection
