@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Package Information</h4>

            </div>
        </div>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-white rounded text-primary" style="font-size: 20px"><strong>Tracking Number:</strong>
        <div style="margin-left:10%">{{ $package->reference_number }}</div>
    </div>
    <div style="margin-top: 10px">

        <div class="shadow-lg p-3 mb-5 bg-white rounded" style=" width:70%;margin-left:250px"><strong style="font-size: 20px;"
                class="d-flex align-items-center justify-content-center">Sender
                Information</strong>
            <div class="header-u" style="margin-top:20px;display:flex;margin-left:215px ">
                <div style="width: 50%">
                    <h5 class="card-title">Sender Phone Number</h5>
                    {{ $package->sender_phone }}
                </div>
                <div style="width: 50%; margin-left:20px">
                    <h5 class="card-title">Receiver Phone Number</h5>
                    {{ $package->receiver_phone }}
                </div>
            </div>
            <div class="header-u" style="margin-top:20px;display:flex;margin-left:215px">
                <div style="width: 50%">
                    <h5 class="card-title text-warning">Departure</h5>
                    {{ $branch->b_name }}
                </div>
                <div style="width: 50%; margin-left:20px">
                    <h5 class="card-title text-danger">Destination</h5>
                    {{ $destination->b_name }}
                </div>
            </div>

        </div>

        <!--Edit goods -->
        <div class="shadow-lg p-3 mb-5 bg-white rounded" style=" width:95%; margin-left:55px"><strong
                style="font-size: 20px;">Package
                Information</strong>
            <div class="modal fade" id="goodEditModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalToggle">Edit Goods</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!--We use ajax so we need id-->
                            <form id="editFormID" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- price and quantity input -->
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="package_price" class="form-control"
                                                name="package_price" value=" " />
                                            <label class="form-label" for="form7Example1">Package Price</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <select class="form-select" name="package_type" id="package_type"
                                                aria-label=".form-select-lg example" value="">
                                                <option selected id="p_type"></option>
                                                @foreach ($package_types as $package_type)
                                                    <option value="{{ $package_type->id }}">
                                                        {{ $package_type->package_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--Hidden fields -->
                                {{-- <input type="hidden" name="num" value="{{ $num = $num + 1 }}">
                                <input type="hidden" name="total_fee" value="{{ $total_fee }}"> --}}
                                <!-- Message input -->
                                <div class="row mb-3" style="margin-top: 5px">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="text" id="fee" class="form-control" name="fee"
                                                value=" " />
                                            <label class="form-label" for="form7Example2">Fee</label>
                                        </div>
                                    </div>
                                    {{-- <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="total_fee" class="form-control" name="total_fee" />
                                            <label class="form-label" for="form7Example2" value=" ">Total Fee</label>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row mb-3" style="margin-top: -10px">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea id="message" class="form-control" name="message" maxlength="225" rows="3"
                                        placeholder="This message has a limit of 225 chars." value=""></textarea>

                                </div>
                                <!--hidden fields-->
                                <input type="hidden" value="" id="goodId" name="id">
                                <button type="submit" data-bs-dismiss="modal" class="btn btn-info" id="savedBtn"
                                    style="margin-left: 70%">
                                    Saved
                                </button>

                                <a class="btn btn-dark" data-bs-dismiss="modal">Close</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Edit goods-->
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:3%">
                <thead>
                    <tr class="text-center">

                        <th>ID</th>
                        <th>Package Price</th>
                        <th>Package Type</th>
                        <th>Fee</th>
                        <th>Messages</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($goods as $key => $good)
                        <tr class="text-center">
                            <td>{{ $good->id }}</td>
                            <td>{{ $good->package_price }}</td>
                            <td>{{ $good->ptype->package_type }}</td>
                            <td>{{ $good->fee }}</td>
                            <td>{{ $good->message }}</td>

                            <td>
                                <a data-toggle="tooltip" title='Edit' role="button" data-bs-toggle="modal"
                                    class="btn btn-success editbtn" onclick="goodID({{ $good->ptype_id }})">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="text-center" style="margin-top:20px;display:flex">
            <div style="width: 50%">
                <h5 class="card-title p-3 mb-2 bg-success text-white">STATUS</h5>
                <h6 class="text-center"> {{ $package->status }}</h6>
            </div>
            <div style="width: 50%; margin-left:20px">
                <h5 class="card-title p-3 mb-2 bg-warning text-dark">PAYMENT STATUS</h5>
                <h6 class="text-center"> {{ $package->pay_status }}</h6>
            </div>



            <div style="width: 50%; margin-left:20px">
                <h5 class="card-title p-3 mb-2 bg-primary text-white">TOTAL ITEMS</h5>
                <h6 class="text-center">{{ $package->total_item }}</h6>

            </div>

            <div style="width: 50%; margin-left:20px">
                <h5 class="card-title p-3 mb-2 bg-info text-white">TOTAL FEE</h5>
                <h6 class="text-center"> {{ $package->total_fee }} $</h6>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
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

                //get data by one row and get by order
                $('#goodId').val(data[0]);
                $('#package_price').val(data[1]);
                //in select option have two type to do (val and text)
                $('#p_type').val(good_id);
                //display(use only select)
                $('#p_type').text(data[2]);
                $('#fee').val(data[3]);
                // $('#total_fee').val(data[4]);
                $('#message').val(data[4]);
            })
        });
        //we use submit when we saved data
        //form id
        $('#editFormID').on('submit', function(e) {
            //
            e.preventDefault();

            //create variable get data from hidden fields
            var good_id = $("#goodId").val();
            //request/response from controller 
            $.ajax({
                url: `/manager/goods/update/${good_id}`,
                type: "PUT",
                data: $("#editFormID").serialize(),
                //serialize() = $request from controller 
                success: function(res) {
                    // window.location = window.
                    location.reload();

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
    </script>
@endsection
