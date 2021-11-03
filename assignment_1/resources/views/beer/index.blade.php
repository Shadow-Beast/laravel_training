@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- Add Beer Button -->
        <div class="clearfix">
            <a class="btn btn-success float-right my-3" href="/create-beer">
                <i class="fa fa-plus"></i> Add Beer
            </a>
        </div> 

        <!-- Import File for Beers-->
        <form action="/api_view/import-beers" method="post" onSubmit="return confirm('Do you want to add this file?')" class="my-2" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="clearfix">
                <input type="file" name="file" class="border float-left col-sm-11 pl-0">
                <button type="submit" class="btn btn-secondary btn-sm float-right">
                    <span class="fas fa-file-import"> Import</span>
                </button>
            </div>  
        </form>


        <!-- Current Beers -->
        @if (count($beers) > 0)
        <table class="table table-bordered table-responsive-lg">
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
            @foreach ($beers as $beer)
                <tr>
                    <td>{{ $beer->id }}</td>
                    <td>{{ $beer->brewery_id }}</td>
                    <td>{{ $beer->abv }}</td>
                    <td>{{ $beer->ibu }}</td>
                    <td>{{ $beer->name }}</td>
                    <td>{{ $beer->style }}</td>
                    <td>{{ $beer->ounces }}</td>
                    <td>{{ $beer->created_at }}</td>
                    <td>{{ $beer->updated_at }}</td>
                    <td width="13%">
                        <a href="/view-beer/{{ $beer->id }}" class="btn btn-dark mr-1" title="View" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                        <a href="/update-beer/{{ $beer->id }}" class="btn btn-info mr-1" title="Update" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>
                        <form action="/delete-beer/{{ $beer->id }}" method="post" onSubmit="return confirm('Do you want to delete {{ $beer->name }}?')" class="delete">
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