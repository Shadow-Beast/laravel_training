@extends('layouts.api.app')

@section('content')

    <div class="panel-body">
        <!-- Display Validation Errors -->
        {{-- @include('common.errors') --}}

        <!-- Add Beer Button -->
        <div class="clearfix">
            <a class="btn btn-success float-right my-3" href="/create-beer">
                <i class="fa fa-plus"></i> Add Beer
            </a>
        </div> 

        <!-- Current Beers -->
        <table class="table table-bordered table-responsive-lg">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Brewery ID</th>
                    <th>Abv</th>
                    <th>Ibu</th>
                    <th>Name</th>
                    <th>Style</th>
                    <th>Ounces</th>
                    <th>Created Time</th>
                    <th>Updated Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table> 
    </div>
    
@endsection