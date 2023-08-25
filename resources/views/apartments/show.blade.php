@extends('layouts.app')

@section('content')
<br>

    <div class="container">
        <h2>Apartment Details</h2>
        <p><strong>Apartment Number:</strong> {{ $apartment->ApartmentsNumber }}</p>
        <p><strong>Size (sqm):</strong> {{ $apartment->SizeParSquareMeter }}</p>
        <p><strong>Price per sqm:</strong> {{ $apartment->PriceParSquareMeter }}</p>
        <p><strong>Total Price:</strong> {{ $apartment->TotalPrice }}</p>
        <p><strong>Status:</strong>
             @if ($apartment->Status === 'Available')
            <span class="badge bg-success">{{ $apartment->Status }}</span>
        @elseif ($apartment->Status === 'Sold')
            <span class="badge bg-danger">{{ $apartment->Status }}</span>
        @elseif ($apartment->Status === 'Reserved')
            <span class="badge bg-warning">{{ $apartment->Status }}</span>
        @else
            {{ $apartment->Status }}
        @endif</p>
        
        <!-- Display more fields here -->
        <div class="mt-3">
            @if(auth()->user()->is_admin === 1)
            <a href="{{ route('apartments.edit', $apartment->ApartmentsID) }}" class="btn btn-primary btn-sm ms-2"><i class="fa-regular fa-pen-to-square"></i></a>
            <form action="{{ route('apartments.destroy', $apartment->ApartmentsID) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Are you sure you want to delete this apartment?')"><i class="fa-solid fa-trash-can"></i></button>
            </form>
            @endif
            <a href="{{ route('apartments.index') }}" class="btn btn-secondary btn-sm ms-2">Go back</a>
        </div>
    </div>
@endsection
