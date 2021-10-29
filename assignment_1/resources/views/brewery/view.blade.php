@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Brewery Detail</h2>
            <div class="form-group">
                <label>ID</label>
                <p><b>{{ $brewery->id }}</b></p>
            </div>
            <div class="form-group">
                <label>Name</label>
                <p><b>{{ $brewery->name }}</b></p>
            </div>
            <div class="form-group">
                <label>City</label>
                <p><b>{{ $brewery->city }}</b></p>
            </div>
            <div class="form-group">
                <label>State</label>
                <p><b>{{ $brewery->state }}</b></p>
            </div>
            <div class="form-group">
                <label>Created Time</label>
                <p><b>{{ $brewery->created_at }}</b></p>
            </div>
            <div class="form-group">
                <label>Updated Time</label>
                <p><b>{{ $brewery->updated_at }}</b></p>
            </div>
            <a href="/" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@endsection