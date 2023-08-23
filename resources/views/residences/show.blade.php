@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Residence Details</h2>
        <p><strong>Residence Name:</strong> {{ $residence->ResidenceName }}</p>
        <p><strong>Residence Number:</strong> {{ $residence->ResidenceNumber }}</p>
        
        <!-- Display more fields here -->

        <div class="mt-4">
            <a href="{{ route('residences.edit', $residence->ResidenceID) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('residences.destroy', $residence->ResidenceID) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
