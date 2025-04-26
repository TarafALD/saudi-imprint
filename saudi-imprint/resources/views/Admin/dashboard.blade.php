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
        <hr><br>
        <h2>Landmarks</h2><br>
        <div class="mb-3">
            <a href="{{ route('landmarks.create') }}" class="btn btn-primary">
                Add New Landmark
            </a>
        </div>        
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Opening Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($landmarks as $landmark)
                        <tr>
                            <td>{{ $landmark->Name }}</td>
                            <td>{{ $landmark->Location }}</td>
                            <td>{{ $landmark->Description }}</td>
                            <td>{{ $landmark->Opening_Hours }}</td>
                            <td>
                                <a href="{{ route('landmarks.edit', $landmark->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('landmarks.destroy', $landmark->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop