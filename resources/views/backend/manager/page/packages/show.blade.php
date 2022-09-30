@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Package Information</h4>

            </div>
        </div>
    </div>

    {{-- <div class="shadow-lg p-3 mb-5 bg-white rounded text-primary" style="font-size: 20px"><strong>Tracking Number:</strong>
        <div style="margin-left:10%">{{ $package->reference_number }}</div>
    </div> --}}
    <div style="margin-top: 10px">

        <div class="card">
            <div class="card mb-3 p-3 bg-white rounded">
                <div class="p-4 text-center text-white text-lg bg-primary rounded-top"><span
                        class="text-uppercase">Tracking
                        No - </span><span class="text-medium">{{ $package->reference_number }}</span></div>
                <div class="row mt-3">
                    <div class="col shadow-lg md-3">
                        <h6 class="text-dark bg-light text-uppercase p-3 text-center">
                            Sender Information </h6>
                        <div class="mt-3">Sender Phone Number: {{ $package->sender_phone }}</div>
                        <div class="mt-3">Sender Email: {{ $package->sender_email }}</div>
                        <div class="mt-3">Current Branch: {{ $package->branch_departure->b_name }}</div>
                     
                    </div>
                    <div class="col shadow-lg md-3">
                        <h6 class="text-dark bg-light text-uppercase p-3 text-center">Receiver Information</h6>
                        <div class="mt-3">Receiver Phone Number: {{ $package->receiver_phone }}</div>
                        <div class="mt-3">Receiver Email: {{ $package->receiver_email }}</div>
                        <div class="mt-3">Destination Branch: {{ $package->branch_departure->b_name }}</div>
                    </div>
                </div>

            </div>
            <div class="card mb-3 p-3 bg-white rounded">
                <div class="p-4 text-center text-white text-lg bg-primary rounded-top"><span
                        class="text-uppercase">Tracking History</div>
                        <div class="row mt-3">
                            <div class="col shadow-lg md-3">
                                <h6 class="text-dark bg-light text-uppercase p-3 text-center">
                                    Pacakge Information </h6>
                                <div class="mt-3">Package Price: {{ $package->package_price }} $</div>
                                <div class="mt-3">Package Type: {{ $package->ptype->package_type }}</div>
                                <div class="mt-3">Weight: {{ $package->weight }} (kg)</div>
                                <div class="mt-3">Delivery Charges: {{ $package->delivery_charge }} $</div>
                                <div class="mt-3">Payment Status: {{ $package->pay_status }}</div>
                             
                            </div>
                            <div class="col shadow-lg md-3">
                                <h6 class="text-dark bg-light text-uppercase p-3 text-center">Message</h6>
                                <div class="mt-3">Product Description: {{ $package->product_description }}</div>
                                <div class="mt-3">Special Instruction: {{ $package->special_instruction }}</div>
                               
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col shadow-lg md-3">
                                <h6 class="text-dark bg-light text-uppercase p-3 text-center">
                                    Date </h6>
                                <div class="mt-3 text-center"> {{ $package->created_at->toDateString() }}</div>
                               
                             
                            </div>
                            <div class="col shadow-lg md-3">
                                <h6 class="text-dark bg-light text-uppercase p-3 text-center">Status</h6>
                                <div class="mt-3 text-center"> {{ $package->status }}</div>
                                
                               
                            </div>
                        </div>

            </div>
        </div>
       
    </div>
    

    {{-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <script>
        let good_id;

        function goodID(id) {
            // good equal parameter
            good_id = id;
        }
        // when we click the button modal will popup
        $(document).ready(function() {

            $('.editbtn').on('click', function() {
                $('#goodEditModal').modal('show');
                //closest tr (table row)
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text(); //attribute
                    //get data by specific one row
                }).get();
                //test data
                console.log(data, "data");
                //if branch is receiver so branch can be make packages completed
                var branch_id = $('#branch').val();
                var departure_id = $('#departure').val();
                if (branch_id == departure_id) {
                    $('#completed').hide();
                }

                //get data by one row and get by order
                // $('#goodId').val(data[0]);
                $('#package_price').val(data[1]);
                //in select option have two type to do (val and text)
                $('#p_type').val(data[2]);
                //display(use only select)
                $('#p_type').text(data[2]);
                $('#fee').val(data[3]);

                // $('#total_fee').val(data[4]);
                $('#message').val(data[4]);
                $('#g_status').val(data[5]);
                //display(use only select)
                $('#g_status').text(data[5]);
            })
        });
        //we use submit when we saved data
        //form id
        $('#editFormID').on('submit', function(e) {
            //
            e.preventDefault();
        //    alert($('#editFormID').serialize());
        //    alert(good_id);
            // create variable get data from hidden fields
            // var good_id = $("#goodId").val();
            // request/response from controller
            $.ajax({
                //route controller // connect to controller
                url: `/manager/goods/update/${good_id}`,
                type: "PUT",
                data: $("#editFormID").serialize(),
                //serialize() = $request from controller

                success: function(res) {
                    // window.location = window.
                    // location.reload();
                    // alert(res);
                    console.log(res);
                },
                error: function(response) {
                    console.log(response);
                }
                // setTimeout(() => {
                //     document.location.reload();
                // }, 3000);

            });
        })
    </script> --}}
@endsection
