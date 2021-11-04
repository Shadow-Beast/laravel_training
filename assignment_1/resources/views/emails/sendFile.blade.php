@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Send Mail with File</h2>
            <p>Please fill this form and submit to send mail.</p>
            <form action="/mail/sendFile" method="post" onSubmit="return confirm('Are you sure to send?')">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="receiver_email@gmail.com">
                </div>              
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="/" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection