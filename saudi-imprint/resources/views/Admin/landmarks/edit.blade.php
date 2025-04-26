@extends('adminlte::page')

@section('title', 'Edit Landmark')

@section('content_header')
    <h1>Edit Landmark</h1>
@stop

@section('content')
    <form action="{{ route('landmarks.update', $landmark->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="Name" value="{{ $landmark->Name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image Path:</label>
            <input type="text" name="Image" value="{{ $landmark->Image }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Opening Hours:</label>
            <input type="time" name="Opening_Hours" value="{{ $landmark->Opening_Hours }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="Location" value="{{ $landmark->Location }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <input type="text" name="Description" value="{{ $landmark->Description }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update Landmark</button>
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
