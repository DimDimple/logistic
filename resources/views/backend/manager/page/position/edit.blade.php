@extends('backend.manager.layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9 mt-5">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width:1000px; margin-left:100px">
                <div class="card-body shadow-lg p-3 mb-5 bg-white rounded">
                    <h4 class="card-title shadow-lg p-3 mb-5 bg-white rounded">EDIT POSITION <span> ID :
                            {{ $types->id }}</span>
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
                    <form class="custom-validation" action="{{ route('position.update', $types->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class=" row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">POSITION</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="type" name="type"
                                    placeholder="Please input position of employee only"
                                    value="{{ $types->type }}">
                            </div>
                        </div>
                        <div class="mb-0 float-end">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Update
                                </button>
                                {{-- <a class="btn btn-secondary" href="{{ route('employees.index') }}"> Back</a> --}}
                                <a class="btn btn-secondary" href="{{ route('position.index') }}"> Back</a>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
