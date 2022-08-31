@extends('backend.manager.layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 mb-4">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <h2 class="mb-0">Edit Package</h2>
            </div>

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
            
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <form action="{{ route('packages.update', $package->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" id="form7Example1" class="form-control" value="{{ $package->sender_phone }}"
                                    name="sender_phone" />
                                <label class="form-label" for="form7Example1">Sender Phone Number</label>
                            </div>
                        </div>
                   
                   
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" id="form7Example2" class="form-control" value="{{ $package->receiver_phone }}"
                                    name="receiver_phone" />
                                <label class="form-label" for="form7Example2">Receiver Phone Number</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="num" value="{{ $num }}">
                    <input type="hidden" name="total_item" value="{{ $total_item }}">
                    <input type="hidden" name="total_fee" value="{{ $total_fee }}">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" id="form7Example1" class="form-control" value="{{ $package->total_item }}"
                                name="total_item" />
                                <label class="form-label" for="form7Example1">Total Item</label>
                            </div>
                        </div>
                   
                   
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" id="form7Example2" class="form-control" value="{{ $package->total_fee }}"
                                name="total_fee" />
                                <label class="form-label" for="form7Example2">Total Fee</label>
                            </div>
                        </div>
                    </div>
                    <!-- price and quantity input -->
                
                        <div class="row mb-5">
                            <div class="col">
                                <select class="form-select" aria-label="Disabled select example" name="status">
                                    <option selected value=" {{ $package->pay_status }}"> {{ $package->status }}</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Decline">Decline</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Disabled select example"
                                    name="pay_status">
                                    <option selected value=" {{ $package->pay_status }}">  {{ $package->pay_status }}</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
                                </select>
                            </div>
                        </div>

                  
                    <button type="submit" class="btn btn-outline-primary"
                    style="margin-left: 80%">
                    Submit
                </button> 
                <a class="btn btn-outline-dark" href="{{ route('packages.index') }}"> Back</a>
                
                </form>

               
            </div>
        </div>
    </div>
</div>
@endsection
