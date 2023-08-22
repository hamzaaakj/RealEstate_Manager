@extends('layouts.app')

@section('content')
    <h1>Create Apartment</h1>
    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf
        <label for="ApartmentsNumber">Apartment Number:</label>
        <input type="text" name="ApartmentsNumber" id="ApartmentsNumber">
        
        <label for="SizeParSquareMeter">Size (sqm):</label>
        <input type="number" name="SizeParSquareMeter" id="SizeParSquareMeter">
        
        <label for="PriceParSquareMeter">Price per sqm:</label>
        <input type="number" step="0.01" name="PriceParSquareMeter" id="PriceParSquareMeter">
        
        <label for="TotalPrice">Total Price:</label>
        <input type="number" step="0.01" name="TotalPrice" id="TotalPrice">
        
        <label for="Status">Status:</label>
        <select name="Status" id="Status">
            <option value="Available">Available</option>
            <option value="Sold">Sold</option>
            <option value="Reserved">Reserved</option>
        </select>
        <label for="ResidenceID">Residence:</label>
        <select name="ResidenceID" id="ResidenceID">
            @foreach($residences as $residence)
                <option value="{{ $residence->ResidenceID }}">{{ $residence->ResidenceName }}</option>
            @endforeach
        </select>
        
        <!-- Add more form fields here -->

        <button type="submit">Create</button>
    </form>
@endsection
