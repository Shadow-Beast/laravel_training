@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- Add Brewery Button -->
        <div class="clearfix">
            <a class="btn btn-success float-right my-3" href="/create-brewery">
                <i class="fa fa-plus"></i> Add Brewery
            </a>
        </div> 

        <!-- Import File for Breweries-->
        <form action="/import-breweries" method="post" onSubmit="return confirm('Do you want to add this file?')" class="my-2" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="clearfix">
                <input type="file" name="file" class="border float-left col-sm-11 pl-0">
                <button type="submit" class="btn btn-secondary btn-sm float-right">
                    <span class="fas fa-file-import"> Import</span>
                </button>
            </div>  
        </form>

        <!-- Current Breweries -->
        @if (count($breweries) > 0)
        <table class="table table-bordered table-responsive-lg">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>City</th>
                <th>State</th>
                <th>Created Time</th>
                <th>Updated Time</th>
                <th>Actions</th>
            </tr>
            @foreach ($breweries as $brewery)
                <tr>
                    <td>{{ $brewery->id }}</td>
                    <td>{{ $brewery->name }}</td>
                    <td>{{ $brewery->city }}</td>
                    <td>{{ $brewery->state }}</td>
                    <td>{{ $brewery->created_at }}</td>
                    <td>{{ $brewery->updated_at }}</td>
                    <td>
                        <a href="/view-brewery/{{ $brewery->id }}" class="btn btn-dark mr-3" title="View" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                        <a href="/update-brewery/{{ $brewery->id }}" class="btn btn-info mr-3" title="Update" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>
                        <form action="/delete-brewery/{{ $brewery->id }}" method="post" onSubmit="return confirm('Do you want to delete {{ $brewery->name }}?')" class="delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" title="Delete" data-toggle="tooltip">
                                <span class="fa fa-trash"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table> 
        @endif 
    </div>
    
@endsection