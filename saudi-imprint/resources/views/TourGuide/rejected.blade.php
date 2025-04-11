@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Application Rejected</div>

                <div class="card-body">
                    <div class="alert alert-danger">
                        <h4>Your tour guide application was not approved</h4>
                        <p>Unfortunately, your application has been rejected. This is due to:</p>
                        <ul>
                            <li>Incomplete or invalid license information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection