@extends('backend.manager.layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Add New Package</h5>
                </div>
                <div class="card-body">
                    <form >
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example1" class="form-control" />
                                    <label class="form-label" for="form7Example1">Sender Phone Number</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" class="form-control" />
                                    <label class="form-label" for="form7Example2">Receiver Phone Number</label>
                                </div>
                            </div>
                        </div>
                            <!-- price and quantity input -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example1" class="form-control" />
                                    <label class="form-label" for="form7Example1">Package Value</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" class="form-control" />
                                    <label class="form-label" for="form7Example2">Quantity</label>
                                </div>
                            </div>
                        </div>

                        <!-- Select Province-->
                        <div class="form-outline mb-5">
                            <select class="form-select" aria-label="Disabled select example">
                                <option selected>Destination</option>
                                <option value="1">Pnhom Penh</option>
                                <option value="2">Prey Veng</option>
                                <option value="3">Tboung Khmum</option>
                                <option value="4">Koh Kong </option>
                                <option value="5">Mondulkiri</option>
                            </select>
                        </div>

                        <!-- Select Package item -->
                        <div class="form-outline mb-5">

                            <select class="form-select" aria-label="Disabled select example">
                                <option selected>Package Type</option>
                                <option value="1">Paperboard boxes</option>
                                <option value="2">Plastic boxes</option>
                                <option value="3">Poly bags</option>
                                <option value="4">Foil sealed bags</option>
                                <option value="5">Rigid boxes</option>
                            </select>
                        </div>
                        <!-- Message input -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="form7Example7" rows="1"></textarea>
                                    <label class="form-label" for="form7Example1">Additional Information</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form7Example2" class="form-control" />
                                    <label class="form-label" for="form7Example2">Shipping</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary btn-lg btn-block" style="margin-left: 85%">
                        Edit
                    </button>
                    <button type="button" id="inputId" onclick="getInputValue();" class="btn btn-primary btn-lg btn-block" >
                        Send
                    </button>
                </div>
            </div>
        </div>

      
    </div>
@endsection
