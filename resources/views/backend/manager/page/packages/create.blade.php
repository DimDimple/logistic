@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create New Package</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item active">Create New Package</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="card mb-4">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">

                    <div class="text-right" style="display:flex">
                        <h5>Destination Information</h5>
                        <h5 style="margin-left: 36%">Package Iterm</h5>
                        {{-- <a type="button" class="btn btn-primary float-end" href="/manager/goods/create"
                            style="margin-left: 30%; margin-top:-2px">
                            Add Goods</a> --}}
                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title " id="exampleModalToggleLabel">Add Goods</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('storage.store') }}" method="POST">
                                            @csrf

                                            <!-- price and quantity input -->
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form7Example1" class="form-control"
                                                            name="package_price" />
                                                        <label class="form-label" for="form7Example1">Package Price</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <div class="form-outline">
                                                            <input type="text" id="form7Example1" class="form-control"
                                                                name="package_type" />
                                                            <label class="form-label" for="form7Example1">Package
                                                                Type</label>                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Message input -->
                                            <div class="row mb-3" style="margin-top: 5px">
                                                <div class="col">
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="form7Example2" class="form-control"
                                                            name="quantity" />
                                                        <label class="form-label" for="form7Example2">Quantity</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form7Example2" class="form-control"
                                                            name="fee" />
                                                        <label class="form-label" for="form7Example2">Fee</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3" style="margin-top: -10px">
                                                <label for="message-text" class="col-form-label">Message:</label>
                                                <textarea id="textarea" class="form-control" name="message" maxlength="225" rows="3"
                                                    placeholder="This message has a limit of 225 chars."></textarea>

                                            </div>
                                            <input type="hidden" name="num" value="{{ $num = $num + 1 }}">
                                            <!--hidden fields-->
                                            <button type="submit" data-bs-dismiss="modal"
                                                class="btn btn-primary btn-rounded waves-effect waves-light"
                                                style="margin-left: 70%">
                                                Saved
                                            </button>

                                            <a class="btn btn-dark btn-rounded waves-effect waves-light"
                                                data-bs-dismiss="modal" href="{{ route('packages.create') }}">
                                                Cancel</a>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button"
                            style="margin-left: 36%; margin-top:-2px">Add Goods</a>
                    </div>
                    <div class="infor" style="display:flex">
                        <div style="width:40%; ">
                            <form action="{{ route('packages.store') }}" method="POST" style="margin-top:15px">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="number" id="form7Example1" class="form-control"
                                                name="sender_phone" />
                                            <label class="form-label" for="form7Example1">Sender Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="number" id="form7Example2" class="form-control"
                                                name="receiver_phone" />
                                            <label class="form-label" for="form7Example2">Receiver Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- price and quantity input -->
                                <div class="row mb-5">
                                    <div class="col">
                                        <select class="form-select" aria-label="Disabled select example"
                                            name="departure_id">
                                            @foreach ($branches as $branch)
                                                @if ($branch->id == $departure_id)
                                                    <option selected value="{{ $branch->id }}">{{ $branch->b_name }}
                                                    </option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col">
                                        <select class="form-select" aria-label="Disabled select example"
                                            name="destination_id">
                                            <option selected>Destination</option>
                                            @foreach ($branches as $branchOne)
                                                @if ($branchOne->b_name !== $branch->b_name)
                                                    <option value="{{ $branchOne->id }}">{{ $branchOne->b_name }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col">
                                        <select class="form-select" aria-label="Disabled select example"
                                            name="status">
                                            <option selected>Status</option>
                                            <option value="Pending" >Pending</option>
                                            <option value="Processing" >Processing</option>
                                            <option value="Decline" >Decline</option>
                                            <option value="Completed" >Completed</option>
                                        
                                        </select>
                                    
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col">
                                        <select class="form-select" aria-label="Disabled select example"
                                            name="pay_status">
                                            <option selected>Payments Status</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Unpaid">Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div style="width:50%; margin-left:8%; margin-top:2%">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Quantity</th>
                                        <th>Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    @foreach ($goods as $key => $good)  
                                 
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $good->quantity }}</td>
                                            <td>{{ $good->fee }} $</td>
                                            {{-- <td>
                                            <form action="{{ route('goods.delete', $good->id) }}" method="POST">
                                                

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-danger btn-rounded waves-effect waves-light">Remove</button>
                                            </form></td> --}}
                                        </tr>
                                    @endforeach
                                            {{-- <tr>
                                                <td></td>
                                                <td></td>
                                                <td>Total Item:</td>
                                                <td></td>
                                               
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td >Total Fee:</td>
                                                <td>$</td>
                                             
                                            </tr> --}}
                                </tbody>
                            </table>
                        </div>
                       

                    </div>
                   
                   
                        <input type="hidden" name="num" value="{{ $num = $num + 1 }}">
                        <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light"
                            style="margin-left: 90%">
                            Submit
                        </button></a>


                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
