@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Update Brewery</h2>
            <p>Please fill this form and submit to update brewery to the database.</p>
            <form action="/brewery/{{ $brewery->id }}" method="post" onSubmit="return confirm('Do you want to update this brewery?')">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $brewery->name }}">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" value="{{ $brewery->city }}">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" class="form-control" value="{{ $brewery->state }}">                   
                </div>                
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="/" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection