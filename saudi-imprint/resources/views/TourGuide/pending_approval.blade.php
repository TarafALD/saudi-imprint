@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Application Pending</div>

                <div class="card-body">
                    <div class="alert alert-info">
                        <h4>Your tour guide application is pending approval</h4>
                        <p>Our administrators are reviewing your application and license information. 
                           You will receive an email notification once a decision has been made.</p>
                        <p>Thank you for your patience!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection