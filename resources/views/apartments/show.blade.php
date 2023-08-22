@extends('layouts.app')

@section('content')
    <h1>Apartment Details</h1>
    <p><strong>Apartment Number:</strong> {{ $apartment->ApartmentsNumber }}</p>
    <p><strong>Size (sqm):</strong> {{ $apartment->SizeParSquareMeter }}</p>
    <p><strong>Price per sqm:</strong> {{ $apartment->PriceParSquareMeter }}</p>
    <p><strong>Total Price:</strong> {{ $apartment->TotalPrice }}</p>
    <p><strong>Status:</strong> {{ $apartment->Status }}</p>
    
    <!-- Display more fields here -->
<div> 
    @if(auth()->user()->is_admin === 1)
    <a href="{{ route('apartments.edit', $apartment->ApartmentsID) }}">Edit</a>
    <form action="{{ route('apartments.destroy', $apartment->ApartmentsID) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    @endif
</div>
@endsection
