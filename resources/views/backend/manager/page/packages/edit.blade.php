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
                        <div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="d-flex align-items-center justify-content-center">
    
                                <div class="card mb-3 p-3 mb-5 bg-white rounded" style="width:100%">
                                    <div class="p-4 text-center text-white text-lg bg-secondary rounded-top"><span
                                            class="text-uppercase">Sender Information</div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example1">Sender Phone Number</label>
                                                <input type="number" id="form7Example1" class="form-control"
                                                    name="sender_phone"  value="{{ $package->sender_phone }}"/>
    
                                            </div>
                                        </div>
    
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example2">Sender Email</label>
                                                <input type="text" id="form7Example2" class="form-control"
                                                    name="sender_email"  value="{{ $package->sender_email }}"/>
                                            </div>
                                        </div>
    
                                    </div>
                                    <!-- price and quantity input -->
                                    <div class="row mb-5">
                                        <div class="col">
                                            <select class="form-select" Disabled aria-label="Disabled select example" name="departure">
                                                @foreach ($branches as $branch)
                                                    @if ($branch->id == $departure_id)
                                                        <option selected value="{{ $branch->id }}">{{ $branch->b_name }}
                                                        </option>
                                                        <input type="hidden" name="departure_id" value="{{ $branch->id }}">
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                      
                                </div>
    
                                <div class="card mb-3 p-3 mb-5 bg-white rounded" style="width:100%">
                                    <div class="p-4 text-center text-white text-lg bg-secondary rounded-top"><span
                                            class="text-uppercase"> Receiver Information</div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example1">Receiver Phone Number</label>
                                                <input type="number" id="form7Example1" class="form-control"
                                                    name="receiver_phone" value="{{ $package->receiver_phone }}"/>
    
                                            </div>
                                        </div>
    
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example2">Receiver Email</label>
                                                <input type="text" id="form7Example2" class="form-control"
                                                    name="receiver_email" value="{{ $package->receiver_email}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <select class="form-select" aria-label="Disabled select example" name="destination_id">
                                                <option selected value="{{ $destination->id }}">{{ $destination->b_name }}</option>
                                                @foreach ($branches as $branchOne)
                                                    @if ($branchOne->id !== $departure_id && $branchOne->b_name !== $destination->b_name)  
                                                         <option value="{{ $branchOne->id }}">{{ $branchOne->b_name }}
                                                        </option>
                                                   
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card mb-3 p-3 mb-5 bg-white rounded" style="width:100%;margin-top:-70px">
                                    <div class="p-4 text-center text-white text-lg bg-secondary rounded-top"><span
                                            class="text-uppercase">Package Information</div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example1">Package Price</label>
                                                <input type="number" id="form7Example1" class="form-control"
                                                    name="package_price" value="{{ $package->package_price }}"/>
    
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example1">Package Type</label>
                                                <select class="form-select" name="ptype"
                                                    aria-label=".form-select-lg example">
                                                    <option selected value="{{ $package->ptype }}">{{ $package->ptype->package_type }}</option>
                                                    @foreach ($package_types as $package_type)
                                                        <option value="{{ $package_type->id }}">
                                                            {{ $package_type->package_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example2">Weight(kg)</label>
                                                <input type="text" id="form7Example2" class="form-control"
                                                    name="weight" value="{{ $package->weight }}"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form7Example2">Delivery Charges</label>
                                                <input type="text" id="form7Example2" class="form-control"
                                                    name="delivery_charge" value="{{ $package->delivery_charge }}" />
                                            </div>
                                        </div>
    
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <select class="form-select" aria-label="Disabled select example" name="pay_status">
                                                <option selected value=" {{ $package->pay_status }}"> {{ $package->pay_status }}
                                                </option>
                                                <option value="Paid">Paid</option>
                                                <option value="Unpaid">Unpaid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <select class="form-select" aria-label="Disabled select example" name="status" >
                                                <option selected value="{{ $package->status }}">{{  $package->status }}</option>
                                                @foreach ($status as $stat)
                                                <option value="{{ $stat}}">
                                                    {{ $stat }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="message-text" class="col-form-label">Production Description</label>
                                            <textarea id="textarea" class="form-control" name="product_description" maxlength="225" rows="3"
                                                placeholder="This message has a limit of 225 chars." >{{ $package->product_description }}</textarea>
    
                                        </div>
    
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label for="message-text" class="col-form-label">Sepcial Instruction</label>
                                            <textarea id="textarea" class="form-control" name="special_instruction" maxlength="225" rows="3"
                                                placeholder="This message has a limit of 225 chars." >{{ $package->special_instruction }}</textarea>
    
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>


                        <button type="submit" class="btn btn-info" style="margin-left: 80%">
                            Submit
                        </button>
                        <a class="btn btn-dark" href="{{ route('packages.index') }}"> Back</a>

                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
