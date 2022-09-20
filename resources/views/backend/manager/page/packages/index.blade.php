@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Package</h4>
                <i class='bx bx-calendar-week' style="margin-right:60%"></i>
                <span id="time" style=" position:absolute; margin-left:40%"></span>
            </div>
            <a href="{{ route('package.export') }}">
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

                    {{-- <div class="form-outline" style="width:30%; display:flex">
                        <input type="text" name="q" class="form-control"  style=" margin-top:3%"
                            placeholder="Search package by id or sender phone number">
                    </div> --}}
                    <form action="{{ route('searchPackage') }}" method="POST">
                        @csrf
                        <div class="form-outline" >
                            <input type="text" name="q" placeholder="Search sender and receiver phone number..."
                                style="width:300px; height:40px; padding-left:10px; border:1px solid rgb(219, 219, 219); border-radius:5px" />
                            <button type="submit" style="height:39px; margin-left:3px; border:1px solid rgb(219, 219, 219); border-radius:5px; background-color:rgb(109, 109, 246);color:#fff;padding:0 10px"> Search </button>
                        </div>

                    </form>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:2%">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Sender Phone Number</th>
                                <th>Receiver Phone Number</th>
                                <th>Total Items</th>
                                <th>Total Fee</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @foreach ($packages as $key => $package)
                                @if ($package->departure_id == $branch_id || $package->destination_id == $branch_id)
                                    <tr class="text-center">
                                        <th scope="row">
                                            {{ ($packages->currentPage() - 1) * $packages->links()->paginator->perPage() + $key + 1 }}
                                        </th>
                                        {{-- <td>{{ $package->id }}</td> --}}
                                        <td>{{ $package->sender_phone }}</td>
                                        <td>{{ $package->receiver_phone }}</td>
                                        <td>{{ $package->total_item }}</td>
                                        <td>{{ $package->total_fee }} $</td>

                                        {{-- <td>

                                            <select class="form-select" aria-label="Disabled select example" name="status"
                                                data-package-id="{{ $package->id }}">
                                                <option selected>{{ $package->status }}</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Decline">Decline</option>
                                                <option value="Completed">Completed</option>
                                            </select>

                                        </td> --}}
                                        @if ($package->pay_status == 'Paid')
                                            <td>
                                                <a href="{{ route('updatepaystatus', $package->id) }}"
                                                    class="badge rounded-pill bg-success"
                                                    style="font-size:1.1em">{{ $package->pay_status }}</a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{ route('updatepaystatus', $package->id) }}"
                                                    class="badge rounded-pill bg-danger"
                                                    style="font-size:1.1em">{{ $package->pay_status }}</a>
                                            </td>
                                        @endif
                                        <td>
                                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST">

                                                <a class="btn btn-info btn-sm-rounded btn-sm waves-effect waves-light"
                                                    href="{{ route('packages.show', $package->id) }}">Show</a>

                                                <a class="btn btn-warning btn-sm-rounded btn-sm waves-effect waves-light"
                                                    href="{{ route('packages.edit', $package->id) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{ $packages->links() }}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr ").filter(function() {
                    $(this).toggle($(this.children[0]).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> --}}

    {{-- <!--jquery to do on status option-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> --}}

    {{-- <script>
        let package_id;

        function getId(id) {
            package_id = id; //global variable
            // alert(package_id);
        }
        //options -method, headers, body, mode
        //methods: GET, POST, PUT, DELETE, OPTIONS

        // new headers()
        //headers.append(name, value)
        //connect to token we need header
        //we use on chnage when we select or change data (select option)
        $('select').on('change', function() {
            var status = $("select option:selected").val();
            var token = $('input[name="_token"]').val();
            var package_id = $(this).data('package-id');

            $.ajax({
                url: `/manager/goods/status/update/` + package_id,
                type: "PUT",
                // data: $('#status').serialize(),
                // $('#mytable').serialize(),
                data: {
                    status: status,
                    _token: token,

                },
                success: function(msg) {
                    setInterval($('#message').text(msg));
                    setInterval(location.reload(), 3000);//5000 = 5s
                    // location.reload();
                    // $('#message').text(msg);
                   
                    console.log(msg);
                },
                error: function(response) {
                    console.log(response);
                }
            });

        })
    </script> --}}
@endsection
