@extends('layouts.app')

@section('content')
    <h1>Edit Apartment</h1>
    <form action="{{ route('apartments.update', $apartment->ApartmentsID) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="ApartmentsNumber">Apartment Number:</label>
        <input type="text" name="ApartmentsNumber" id="ApartmentsNumber" value="{{ $apartment->ApartmentsNumber }}">
        
        <label for="SizeParSquareMeter">Size (sqm):</label>
        <input type="number" name="SizeParSquareMeter" id="SizeParSquareMeter" value="{{ $apartment->SizeParSquareMeter }}">
        
        <label for="PriceParSquareMeter">Price per sqm:</label>
        <input type="number" step="0.01" name="PriceParSquareMeter" id="PriceParSquareMeter" value="{{ $apartment->PriceParSquareMeter }}">
        
        <label for="TotalPrice">Total Price:</label>
        <input type="number" step="0.01" name="TotalPrice" id="TotalPrice" value="{{ $apartment->TotalPrice }}">
        
        <label for="Status">Status:</label>
        <select name="Status" id="Status">
            <option value="Available" {{ $apartment->Status == 'Available' ? 'selected' : '' }}>Available</option>
            <option value="Sold" {{ $apartment->Status == 'Sold' ? 'selected' : '' }}>Sold</option>
            <option value="Reserved" {{ $apartment->Status == 'Reserved' ? 'selected' : '' }}>Reserved</option>
        </select>
        
        <label for="ResidenceID">Residence:</label>
        <select name="ResidenceID" id="ResidenceID">
            @foreach($residences as $residence)
                <option value="{{ $residence->ResidenceID }}">{{ $residence->ResidenceName }}</option>
            @endforeach
        </select>
        

        <button type="submit">Update</button>
    </form>
@endsection
