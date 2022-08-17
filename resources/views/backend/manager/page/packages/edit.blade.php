@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3">
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
                
                <div class="card-body">
                    <form action="{{ route('packages.update', $package->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="number" id="form7Example1" value="{{ $package->sender_phone }}" class="form-control" name="sender_phone"/>
                                    <label class="form-label" for="form7Example1">Sender Phone Number</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="number" id="form7Example2" value="{{ $package->receiver_phone }}" class="form-control" name="receiver_phone" />
                                    <label class="form-label" for="form7Example2">Receiver Phone Number</label>
                                </div>
                            </div>
                        </div>
                        <!-- price and quantity input -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example1" value="{{ $package->package_value }}" class="form-control" name="package_value"/>
                                    <label class="form-label" for="form7Example1">Package Value</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" value="{{ $package->quantity}}" class="form-control" name="quantity" />
                                    <label class="form-label" for="form7Example2">Quantity</label>
                                </div>
                            </div>
                        </div>

                        <!-- Select Province-->
                        <div class="form-outline mb-5">
                            <select class="form-select" aria-label="Disabled select example" name="destination">
                                <option selected>{{ $package->destination}}</option>
                                <option value="Pnhom Penh">Pnhom Penh</option>
                                <option value="Prey Veng">Prey Veng</option>
                                <option value="Tboung Khmum">Tboung Khmum</option>
                                <option value="Koh Kong">Koh Kong </option>
                                <option value="Mondulkiri">Mondulkiri</option>
                            </select>
                        </div>

                        <!-- Select Package item -->
                        <div class="form-outline mb-5">

                            <select class="form-select" aria-label="Disabled select example" name="package_type">
                                <option selected>{{ $package->package_type }}</option>
                                <option value="Paperboard boxes">Paperboard boxes</option>
                                <option value="Plastic boxes">Plastic boxes</option>
                                <option value="Poly bags">Poly bags</option>
                                <option value="Foil sealed bags">Foil sealed bags</option>
                                <option value="Rigid boxes">Rigid boxes</option>
                            </select>
                        </div>
                        <!-- Message input -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="form7Example7" rows="1" name="addi_infor">{{ $package->addi_infor }}</textarea>
                                    <label class="form-label" for="form7Example1">Additional Information</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" value="{{ $package->shipping }}" class="form-control" name="shipping"/>
                                    <label class="form-label" for="form7Example2">Shipping</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
                        style="margin-left: 80%">
                        Submit
                    </button> 
                    <a class="btn btn-primary" href="{{ route('packages.index') }}"> Back</a>
                    
                    </form>

                   
                </div>
            </div>
        </div>
    </div>
@endsection
