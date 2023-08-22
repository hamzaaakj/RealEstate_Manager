@extends('layouts.app')

@section('content')
    <h1>Edit Residence</h1>
    <form action="{{ route('residences.update', $residence->ResidenceID) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="ResidenceName">Residence Name:</label>
        <input type="text" name="ResidenceName" id="ResidenceName" value="{{ $residence->ResidenceName }}">
        
        <label for="ResidenceNumber">Residence Number:</label>
        <input type="text" name="ResidenceNumber" id="ResidenceNumber" value="{{ $residence->ResidenceNumber }}">
        
        <!-- Add more form fields here -->

        <button type="submit">Update</button>
    </form>
@endsection
