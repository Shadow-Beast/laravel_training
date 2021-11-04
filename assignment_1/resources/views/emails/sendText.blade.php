@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Display Validation Errors -->
    @include('common.errors')
    
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Send Mail with Text</h2>
            <p>Please fill this form and submit to send mail.</p>
            <form action="/mail/sendText" method="post" onSubmit="return confirm('Are you sure to send?')">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="receiver_email@gmail.com">
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <input type="text" name="title" class="form-control mb-3" placeholder="Title">
                    <textarea class="form-control" id="bodyText" name="bodyText" rows="5" placeholder="Body Text"></textarea>
                </div>                
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="/" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection