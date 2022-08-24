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
                                    <input type="text" id="form7Example1" value="{{ $package->package_price }}" class="form-control" name="package_price"/>
                                    <label class="form-label" for="form7Example1">Package Price</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <select class="form-select" aria-label="Disabled select example" name="package_type">
                                        <option selected>{{ $package_type }}</option>
                                        <option value="Paperboard boxes">Paperboard boxes</option>
                                        <option value="Plastic boxes">Plastic boxes</option>
                                        <option value="Poly bags">Poly bags</option>
                                        <option value="Foil sealed bags">Foil sealed bags</option>
                                        <option value="Rigid boxes">Rigid boxes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Select Province-->
                        <div class="row mb-5">
                            <div class="col">
                                <select class="form-select" aria-label="Disabled select example" name="departure_id" >
                                                 
                                    {{-- @foreach ($branches as $branch)
                                      {{-- <option value="{{ $branch->id }}">{{ $branch->b_name}}</option> --}}
                                    {{-- @endforeach --}}
                                    {{-- {{ $branch}} --}} --}}
                                     <option value="{{ $branch->id }}">{{ $branch->b_name}}</option>
                                    
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Disabled select example" name="destination_id">
                                    <option selected value="{{ $destination->id }}">{{ $destination->b_name}}</option>
                                    @foreach ($branches as $branchOne)
                                        @if($branchOne->b_name!== $branch->b_name)
                                        <option value="{{ $branchOne->id }}">{{ $branchOne->b_name}}</option>
                                        @endif
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>        
                        <!-- Message input -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" value="{{ $package->quantity}}" class="form-control" name="quantity" />
                                    <label class="form-label" for="form7Example2">Quantity</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" value="{{ $package->fee }}" class="form-control" name="fee"/>
                                    <label class="form-label" for="form7Example2">Fee</label>
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
