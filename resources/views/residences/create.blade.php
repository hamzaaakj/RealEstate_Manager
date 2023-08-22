@extends('layouts.app')

@section('content')
    <h1>Create Residence</h1>
    <form action="{{ route('residences.store') }}" method="POST">
        @csrf
        <label for="ResidenceName">Residence Name:</label>
        <input type="text" name="ResidenceName" id="ResidenceName">
        
        <label for="ResidenceNumber">Residence Number:</label>
        <input type="text" name="ResidenceNumber" id="ResidenceNumber">
        
        <!-- Add more form fields here -->

        <button type="submit">Create</button>
    </form>
@endsection
