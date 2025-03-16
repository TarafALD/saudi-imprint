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
            <th>License number</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    @foreach($pendingTGs as $tourGuide)
        <tr>
            <td>{{ $tourGuide->user->name }}</td>
            <td> {{($tourGuide->license_number) }}" </td>
            <td>{{ $tourGuide->status }}</td>
            <td>
                 <form  action="{{ route('admin.tour-guides.approve', $tourGuide->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Approve</button>
                </form> </td>
                <td>
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