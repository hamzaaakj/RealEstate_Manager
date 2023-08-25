@extends('layouts.app')

@section('content')
<br>

    <div class="container">
        <h2>Edit Residence</h2>
        <form action="{{ route('residences.update', $residence->ResidenceID) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="ResidenceName" class="form-label">Residence Name:</label>
                <input type="text" name="ResidenceName" id="ResidenceName" class="form-control" value="{{ $residence->ResidenceName }}">
            </div>
            
            <div class="mb-3">
                <label for="ResidenceNumber" class="form-label">Residence Number:</label>
                <input type="text" name="ResidenceNumber" id="ResidenceNumber" class="form-control" value="{{ $residence->ResidenceNumber }}">
            </div>
            
            <!-- Add more form fields here -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
