@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create New Package</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item active">Please fill user information.</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <div class="card">
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

                <form action="{{ route('packages.store') }}" method="POST">
                    @csrf
                    <div>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="d-flex align-items-center justify-content-center">

                            <div class="card mb-3 p-3 mb-5 bg-white rounded" style="width:100%">
                                <div class="p-4 text-center text-white text-lg bg-secondary rounded-top"><span
                                        class="text-uppercase">Sender Information</div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form7Example1">Sender Phone Number *</label>
                                            <input type="number" id="form7Example1" class="form-control"
                                                name="sender_phone" required />


                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form7Example2">Sender Email</label>
                                            <input type="email" id="form7Example2" class="form-control"
                                                name="sender_email" />
                                        </div>
                                    </div>

                                </div>
                                <!-- price and quantity input -->
                                <div class="row mb-5">
                                    <div class="col">
                                        <label class="form-label" for="form7Example2">Current Branch</label>
                                        <select class="form-select" Disabled aria-label="Disabled select example"
                                            name="departure">
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
                                            <label class="form-label" for="form7Example1">Receiver Phone Number *</label>
                                            <input type="number" id="form7Example1" class="form-control"
                                                name="receiver_phone" required/>

                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form7Example2">Receiver Email</label>
                                            <input type="email" id="form7Example2" class="form-control"
                                                name="receiver_email" />
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-5">
                                    <div class="col">
                                        <label class="form-label" for="form7Example2">Destination Branch *</label>
                                        <select class="form-select" aria-label="Disabled select example"
                                            name="destination_id" required>
                                            <option selected>Destination</option>
                                            @foreach ($branches as $branchOne)
                                                @if ($branchOne->id !== $departure_id)
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
                                            <label class="form-label" for="form7Example1">Package Price *</label>
                                            <input type="text" id="form7Example1" class="form-control"
                                                name="package_price" required/>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form7Example1">Package types *</label>
                                            <select class="form-select" name="ptype_id"
                                                aria-label=".form-select-lg example" required>
                                                <option selected>Package Type</option>
                                                @foreach ($package_types as $package_type)
                                                    <option value="{{ $package_type->id }}">
                                                        {{ $package_type->package_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form7Example2">Weight(kg) *</label>
                                            <input type="text" id="form7Example2" class="form-control"
                                                name="weight" required />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="form7Example2">Delivery Charges *</label>
                                            <input type="text" id="form7Example2" class="form-control"
                                                name="delivery_charge" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label class="form-label" for="form7Example2">Payment Status *</label>
                                        <select class="form-select" aria-label="Disabled select example"
                                            name="pay_status" required>
                                            <option selected>Payment Status</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Unpaid">Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label class="form-label" for="form7Example2">Status *</label>
                                        <select class="form-select" aria-label="Disabled select example" name="status" required>
                                            <option selected>Status</option>
                                            <option value="Pending">Pending</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Production
                                            Description</label>
                                        <textarea id="textarea" class="form-control" name="product_description" maxlength="225" rows="3"
                                            placeholder="This message has a limit of 225 chars."></textarea>

                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Sepcial Instruction</label>
                                        <textarea id="textarea" class="form-control" name="special_instruction" maxlength="225" rows="3"
                                            placeholder="This message has a limit of 225 chars."></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <a class="mb-0 float-end" style="margin-top:-50px;margin-right:10px;">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button></a>
                </form>
            </div>
        </div>
    </div>

@endsection
