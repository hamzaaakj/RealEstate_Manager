@extends('layouts.app')

@section('content')
    <h1>Residence Details</h1>
    <p><strong>Residence Name:</strong> {{ $residence->ResidenceName }}</p>
    <p><strong>Residence Number:</strong> {{ $residence->ResidenceNumber }}</p>
    
    <!-- Display more fields here -->

    <a href="{{ route('residences.edit', $residence->ResidenceID) }}">Edit</a>
    <form action="{{ route('residences.destroy', $residence->ResidenceID) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
