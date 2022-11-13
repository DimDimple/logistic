@extends('backend.admin.layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9 mt-5">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width:1000px; margin-left:100px">
                <div class="card-body shadow-lg p-3 mb-5 bg-white rounded">
                    <h4 class="card-title shadow-lg p-3 mb-5 bg-white rounded">EDIT LOCATION <span> ID :
                            {{ $locations->id }}</span>
                    </h4><br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="custom-validation" action="{{ route('location.update', $locations->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class=" row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">LOCATION: </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="province" name="province"
                                    placeholder="Please input province only"
                                    value="{{ $locations->province }}">
                            </div>
                            <label for="type" class=" mt-3 col-sm-2 col-form-label">ADDRESS: </label>
                            <div class="col-sm-10 mt-3">
                                <input class="form-control" type="text" id="address" name="address"
                                    placeholder="Please input address only"
                                    value="{{ $locations->address }}">
                            </div>
                        </div>
                        <div class="mb-0 float-end">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Update
                                </button>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> --}}
                                <a class="btn btn-secondary" href="{{ route('location.index') }}"> Back</a>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
