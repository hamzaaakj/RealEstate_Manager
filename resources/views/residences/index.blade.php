@extends('layouts.app')

@section('content')
    <h1>Residences List</h1>
    @if(auth()->user()->is_admin === 1)
    <a href="{{ route('residences.create') }}" class="btn btn-primary">Add Residence</a>
    @endif
    <div class="row">
        @foreach($residences as $residence)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $residence->ResidenceName }}</h5>
                        <p class="card-text">
                            Residence Number: {{ $residence->ResidenceNumber }}<br>
                            Number of Apartments: {{ $residence->apartments_count }}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('apartments.index', ['residence_id' => $residence->ResidenceID]) }}" class="btn btn-primary">View Apartments</a>
                            @if(auth()->user()->is_admin === 1)
                                <a href="{{ route('residences.show', ['residence' => $residence->ResidenceID]) }}" class="btn btn-secondary">Show</a>
                                <a href="{{ route('residences.edit', ['residence' => $residence->ResidenceID]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('residences.destroy', ['residence' => $residence->ResidenceID]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection
