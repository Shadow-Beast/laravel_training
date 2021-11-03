@extends('layouts.api.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Create New Beer</h2>
            <p>Please fill this form and submit to add new beer to the database.</p>
            <div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Brewery Name</label>
                    <select name="brewery_id" id="brewery_id" class="form-select form-select-lg col-12">
                    </select>
                </div>
                <div class="form-group">
                    <label>ABV</label>
                    <input type="number" step=0.001 min="0" name="abv" id="abv" class="form-control">
                </div>
                <div class="form-group">
                    <label>IBU (Optional)</label>
                    <input type="number" step=1 min="0" name="ibu" id="ibu" class="form-control">
                </div>
                <div class="form-group">
                    <label>Style</label>
                    <input type="text" name="style" id="style" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ounces</label>
                    <input type="number" name="ounces" id="ounces" step=1 min="0" class="form-control">                   
                </div>                
                <button class="btn btn-primary" onclick="addBeer()">Submit</button>
                <a href="/api_view/beer-list" class="btn btn-secondary ml-2">Cancel</a>
            </div>
        </div>
    </div>
</div>

@endsection