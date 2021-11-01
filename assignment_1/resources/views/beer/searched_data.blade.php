@extends('beer.search')

@section('searchedData')

<!-- Searched Datas -->
@if (count($beers) > 0)
<table class="table table-bordered table-responsive-lg mt-3">
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
    </tr>
    @endforeach
</table>
@endif

@endsection