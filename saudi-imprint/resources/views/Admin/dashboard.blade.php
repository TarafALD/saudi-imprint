@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

{{-- @section('content')
    <p>Tour Guides waiting for verification</p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>License Number</th>
                    <th>Status</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingTGs as $tourGuide)
                    <tr>
                        <td>{{ $tourGuide->user->name }}</td>
                        <td>{{ $tourGuide->license_number }}</td>
                        <td>
                            <span class="badge 
                                @if($tourGuide->status == 'approved') bg-success 
                                @elseif($tourGuide->status == 'rejected') bg-danger 
                                @else bg-warning text-dark @endif">
                                {{ ucfirst($tourGuide->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.tour-guides.approve', $tourGuide->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.tour-guides.reject', $tourGuide->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop --}}
@section('content')
    <p>Tour Guides waiting for verification</p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>License Number</th>
                    <th>Status</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingTGs as $tourGuide)
                    <tr>
                        <td>{{ $tourGuide->user->name }}</td>
                        <td>{{ $tourGuide->license_number }}</td>
                        <td>
                            <span class="badge 
                                @if($tourGuide->status == 'verified') bg-success 
                                @elseif($tourGuide->status == 'rejected') bg-danger 
                                @else bg-warning text-dark @endif">
                                {{ ucfirst($tourGuide->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.tour-guides.approve', $tourGuide->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.tour-guides.reject', $tourGuide->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop