@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Update Beer</h2>
            <p>Please fill this form and submit to update beer to the database.</p>
            <form action="/beer/{{ $beer->id }}" method="post" onSubmit="return confirm('Do you want to update this beer?')">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $beer->name }}">
                </div>
                <div class="form-group">
                    <label>Brewery Name</label>
                    <select name="brewery_id" class="form-select form-select-lg col-12">
                        @foreach ($breweries as $brewery)
                            @if ($brewery->id == $beer->brewery_id)
                                <option value="{{ $brewery->id }}" selected="selected">
                                    {{ $brewery->name }}
                                </option> 
                            @else
                                <option value="{{ $brewery->id }}">
                                    {{ $brewery->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>ABV</label>
                    <input type="number" step=0.001 min="0" name="abv" class="form-control" value="{{ $beer->abv }}">
                </div>
                <div class="form-group">
                    <label>IBU (Optional)</label>
                    <input type="number" step=1 min="0" name="ibu" class="form-control" value="{{ $beer->ibu }}">
                </div>
                <div class="form-group">
                    <label>Style</label>
                    <input type="text" name="style" class="form-control" value="{{ $beer->style }}">
                </div>
                <div class="form-group">
                    <label>Ounces</label>
                    <input type="number" name="ounces" step=1 min="0" class="form-control" value="{{ $beer->ounces }}">                   
                </div>                
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="/beer-list" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection