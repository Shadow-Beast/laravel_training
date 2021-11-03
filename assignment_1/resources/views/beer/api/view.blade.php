@extends('layouts.api.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Beer Detail</h2>
            <div id="api-view">
            </div>            
        </div>
    </div>
</div>

@endsection