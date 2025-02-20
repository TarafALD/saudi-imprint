@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Tour Guides waiting for verification</p>

    <table>
        <tr>
            <th>Name</th>
            <th>License</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    @foreach($pendingTGs as $tourGuide)
        <tr>
            <td>{{ $tourGuide->user->name }}</td>
            <td><a href="{{ Storage::url($tourGuide->license_path) }}" 
                class="btn">
                 View License
             </a></td>
            <td>{{ $tourGuide->status }}</td>
            <td>
                 <form  action="{{ route('admin.tour-guides.approve', $tourGuide->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Approve</button>
                </form> </td>
                <td style="color: red">
                <form  action="{{ route('admin.tour-guides.reject', $tourGuide->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Reject</button> </form></td>
        </tr>     
    @endforeach
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop