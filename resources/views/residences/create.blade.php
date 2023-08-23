@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Residence</h2>
        <form action="{{ route('residences.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ResidenceName" class="form-label">Residence Name:</label>
                <input type="text" name="ResidenceName" id="ResidenceName" class="form-control">
            </div>
            <div class="mb-3">
                <label for="ResidenceNumber" class="form-label">Residence Number:</label>
                <input type="text" name="ResidenceNumber" id="ResidenceNumber" class="form-control">
            </div>
            <!-- Add more form fields here -->

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
