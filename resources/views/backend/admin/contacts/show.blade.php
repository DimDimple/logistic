@extends('backend.admin.layouts.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-4">
                <div class="row">
                    <div class="pull-left">
                        <h3> Show Message ID: {{ $contact->id }}</h3>
                    </div>
                </div><br />

                <div class="card radius-15 w-100 p-3">
                    <div class="card-body" style="font-size: 18px">

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Username:</strong>
                                    {{ $contact->name }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Phone Number:</strong>
                                    {{ $contact->phone }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {{ $contact->email }}
                                </div>
                                <hr>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                                <div class="form-group">
                                    <strong>Message:</strong>
                                    {{ $contact->message }}
                                </div>
                                <hr>

                            </div>
                            <div class="pull-right p-1">
                                <a class="btn btn-info" href="{{ route('contact.index') }}" > Back</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


