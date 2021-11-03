@extends('layouts.api.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Create New Beer</h2>
            <p>Please fill this form and submit to add new beer to the database.</p>
            <form id="api-addBeerForm" method="post" onSubmit="return confirm('Do you want to add this beer?')" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Brewery Name</label>
                    <select name="brewery_id" id="brewery_id" class="form-select form-select-lg col-12">
                    </select>
                </div>
                <div class="form-group">
                    <label>ABV</label>
                    <input type="number" step=0.001 min="0" name="abv" class="form-control">
                </div>
                <div class="form-group">
                    <label>IBU (Optional)</label>
                    <input type="number" step=1 min="0" name="ibu" class="form-control">
                </div>
                <div class="form-group">
                    <label>Style</label>
                    <input type="text" name="style" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ounces</label>
                    <input type="number" name="ounces" step=1 min="0" class="form-control">                   
                </div>                
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="/api_view/beer-list" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection