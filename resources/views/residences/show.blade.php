@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <h2>Residence Details</h2>
        <p><strong>Residence Name:</strong> {{ $residence->ResidenceName }}</p>
        <p><strong>Residence Number:</strong> {{ $residence->ResidenceNumber }}</p>
        
        <!-- Display more fields here -->

        <div class="mt-4">
            @if(auth()->user()->is_admin === 1)
            <a href="{{ route('residences.edit', $residence->ResidenceID) }}" class="btn btn-primary btn-sm ms-2"><i class="fa-regular fa-pen-to-square"></i></a>
            <form action="{{ route('residences.destroy', $residence->ResidenceID) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm ms-2"><i class="fa-solid fa-trash-can"></i></button>
            </form>
            @endif
            <a href="{{ route('residences.index') }}" class="btn btn-secondary btn-sm ms-2">Go back</a>
        </div>
    </div>
@endsection
