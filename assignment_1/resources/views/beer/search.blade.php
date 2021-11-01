@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <!-- Search Form -->
    <div class="row">
        <div class="col-md-12">
            <form action="/search-beer" method="post" class="border px-5 py-3 mt-3">
                {{ csrf_field() }}
                <div class="form-group row mb-3">
                    <label class="col-sm-2">Beer Name</label>
                    <input type="text" name="name" class="form-control col-sm-10">
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2">Brewery Name</label>
                    <select name="brewery_id" class="form-select form-select-lg col-sm-10">
                        @foreach ($breweries as $brewery)
                            <option value="{{ $brewery->id }}">{{ $brewery->name }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2">ABV</label>
                    <input type="number" step=0.001 min="0" name="abv" class="form-control col-sm-10">
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2">IBU (Optional)</label>
                    <input type="number" step=1 min="0" name="ibu" class="form-control col-sm-10">
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2">Style</label>
                    <input type="text" name="style" class="form-control col-sm-10">
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2">Ounces</label>
                    <input type="number" name="ounces" step=1 min="0" class="form-control col-sm-10">                   
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2">Start Date</label>
                    <input type="date" name="start_date" class="form-control col-sm-10">                   
                </div> 
                <div class="form-group row mb-3">
                    <label class="col-sm-2">End Date</label>
                    <input type="date" name="end_date" class="form-control col-sm-10">                   
                </div>        
                <button type="submit" class="btn btn-info">
                    <span class="fas fa-search"> Search Beer</span>
                </button>
            </form>
        </div>
    </div>

    @yield('searchedData')
</div>

@endsection