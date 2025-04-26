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
            <label class="form-label fw-medium">Site's Image</label>
            <input type="file" class="form-control" id="Image" name="Image" accept="image/*" required>
            <small class="form-text text-muted">Upload an image for site  (JPG, PNG, GIF formats, max 2MB).</small>
        </div>

        <div class="mb-3">
            <label>Opening Hours:</label>
            <input type="time" name="Opening_Hours" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-medium">Location</label>
            <select class="form-control" id="Location" name="Location" required>
                <option value="" disabled selected>Select a location</option>
                <option value="Riyadh" {{ old('Location') == 'Riyadh' ? 'selected' : '' }}>Riyadh</option>
                <option value="Aljouf" {{ old('Location') == 'Aljouf' ? 'selected' : '' }}>Al-Jouf</option>
                <option value="Alula" {{ old('Location') == 'Alula' ? 'selected' : '' }}>AlUla</option>
                <option value="Jeddah" {{ old('Location') == 'Jeddah' ? 'selected' : '' }}>Jeddah</option>
            </select>
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
