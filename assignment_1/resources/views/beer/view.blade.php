@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Beer Detail</h2>
            <div class="form-group">
                <label>ID</label>
                <p><b>{{ $beer->id }}</b></p>
            </div>
            <div class="form-group">
                <label>Name</label>
                <p><b>{{ $beer->name }}</b></p>
            </div>
            <div class="form-group">
                <label>Brewery Name</label>
                <p><b>{{ $brewery->name }}</b></p>
            </div>
            <div class="form-group">
                <label>ABV</label>
                <p><b>{{ $beer->abv }}</b></p>
            </div>
            <div class="form-group">
                <label>IBU</label>
                <p><b>{{ $beer->ibu }}</b></p>
            </div>
            <div class="form-group">
                <label>Style</label>
                <p><b>{{ $beer->style }}</b></p>
            </div>
            <div class="form-group">
                <label>Ounces</label>
                <p><b>{{ $beer->ounces }}</b></p>
            </div>
            <div class="form-group">
                <label>Created Time</label>
                <p><b>{{ $beer->created_at }}</b></p>
            </div>
            <div class="form-group">
                <label>Updated Time</label>
                <p><b>{{ $beer->updated_at }}</b></p>
            </div>
            <a href="/beer-list" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@endsection