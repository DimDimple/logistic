@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9 mt-1">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body shadow-lg p-3 mb-5 bg-white rounded">
                    <h4 class="card-title shadow-lg p-3 mb-5 bg-white rounded">ADD NEW EMPLOYEE</h4><br>

                    <form action="{{ route('employeebranch.store') }}" class="custom-validation" method="POST">
                        @csrf
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label">Branch</label>
                            <div class="col">
                                <select class="form-select" Disabled aria-label="Disabled select example" name="branch">
                                    @foreach ($branches as $branch)
                                        @if ($branch->id == $branch_id)
                                            <option selected value="{{ $branch->id }}">{{ $branch->b_name }}
                                            </option>
                                            <input type="hidden" name="branch_id" value="{{ $branch->id }}">
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="firstname" name="firstname"
                                    placeholder="Type firstname">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="firstname" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="firstname" name="lastname"
                                    placeholder="Type lastname">
                            </div>
                        </div>

                        <div class=" row mb-3">
                            {{-- <label>Gender</label> --}}
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="other"value="Other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>

                        </div>

                        {{-- <div class="mb-3">
                        <label>Equal To</label >
                        <div>
                            <input type="password" id="pass2" class="form-control" required
                                    placeholder="Password"/>
                        </div>
                        <div class="mt-2">
                            <input type="password" class="form-control" required
                                    data-parsley-equalto="#pass2"
                                    placeholder="Re-Type Password"/>
                        </div>
                    </div> --}}

                        <div class=" row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" required parsley-type="email"
                                    name="email" placeholder="Enter a valid e-mail" />
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-2 col-form-label">Position</label>
                            <div class="col">
                                <select class="form-select" name="type_id" aria-label=".form-select-lg example">
                                    <option selected>Positions</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" required parsley-type="phone"
                                    name="phone" placeholder="Enter a valid phone number" />
                            </div>
                        </div>



                        <div class=" row mb-3">
                            <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-10">
                                <input data-parsley-type="date" type="date" class="form-control" required id="dob"
                                    name="dob" placeholder="Enter only numbers" />
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="pob" class="col-sm-2 col-form-label">Place of Birth</label>
                            <div class="col-sm-10">
                                <textarea required class="form-control" rows="3" id="pob" name="pob"></textarea>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Current Address</label>
                            <div class="col-sm-10">
                                <textarea required class="form-control" rows="3" id="address" name="address"></textarea>
                            </div>
                        </div>
                        <div class="mb-0 float-end">
                            <div>

                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <a class="btn btn-secondary " href="{{ route('employeebranch.index') }}"> Back</a>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> --}}


                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    @endsection
