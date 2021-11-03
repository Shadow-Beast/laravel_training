@extends('layouts.api.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Update Beer</h2>
            <p>Please fill this form and submit to update beer to the database.</p>
            <div id="api-updateForm">                
            </div>
        </div>
    </div>
</div>

@endsection