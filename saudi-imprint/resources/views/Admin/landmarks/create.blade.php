@extends('adminlte::page')

@section('title', 'Add New Landmark')

@section('content_header')
    <h1>Add New Landmark</h1>
@stop

@section('content')
    <form action="{{ route('landmarks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="Name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image Path:</label>
            <input type="text" name="Image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Opening Hours:</label>
            <input type="time" name="Opening_Hours" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="Location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <input type="text" name="Description" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Landmark</button>
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
