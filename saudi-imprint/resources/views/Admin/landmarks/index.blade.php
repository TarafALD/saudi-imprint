@extends('adminlte::page')

@section('title', 'Manage Landmarks')

@section('content_header')
    <h1>Manage Landmarks</h1>
@stop

@section('content')

    <p>Tour Guides waiting for verification</p>
   

    <p class="mt-4">List of Landmarks</p>
    <a href="{{ route('landmarks.create') }}" class="btn btn-primary mb-3">Add New Landmark</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Opening Hours</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($landmarks as $landmark)
                    <tr>
                        <td>{{ $landmark->Name }}</td>
                        <td><img src="{{ asset('storage/' . $landmark->Image) }}" width="60" alt="Image"></td>
                        <td>{{ $landmark->Location }}</td>
                        <td>{{ $landmark->Description }}</td>
                        <td>{{ $landmark->Opening_Hours }}</td>
                        <td class="text-center">
                            <a href="{{ route('landmarks.edit', $landmark->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('landmarks.destroy', $landmark->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($landmarks->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">No landmarks available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

@stop

@section('css')
@stop

@section('js')
@stop
