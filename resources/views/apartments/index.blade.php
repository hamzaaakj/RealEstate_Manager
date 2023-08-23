@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Apartments List</h1>

        <div class="row">
            <div class="col-md-6 mb-4">
                <!-- Search Bar and Filters -->
                <form id="searchForm" action="{{ route('apartments.index') }}" method="GET" class="d-flex align-items-center">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by apartment number">
                    </div>
                    <select name="status" class="form-select form-select-sm ms-2">
                        <option value="">All Status</option>
                        <option value="Available">Available</option>
                        <option value="Sold">Sold</option>
                        <option value="Reserved">Reserved</option>
                    </select>
                    <a href="{{ route('apartments.index') }}" class="btn btn-secondary btn-sm ms-2">Clear</a>
                </form>
            </div>
            
            <div class="col-md-6 mb-4 text-end">
                @if(auth()->user()->is_admin === 1)
                    <a href="{{ route('apartments.create') }}" class="btn btn-primary">Add Apartment</a>
                @endif
            </div>
        </div>

       
        <div class="row">
            @foreach($apartments as $apartment)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Apartment Number: {{ $apartment->ApartmentsNumber }}</h5>
                            <p class="card-text">
                                @if ($apartment->residence)
                                    Residence Name: {{ $apartment->residence->ResidenceName }}<br>
                                @endif
                                Size (sqm): {{ $apartment->SizeParSquareMeter }}<br>
                                Price per sqm: {{ $apartment->PriceParSquareMeter }}<br>
                                Status:
                                @if ($apartment->Status === 'Available')
                                    <span class="badge bg-success">{{ $apartment->Status }}</span>
                                @elseif ($apartment->Status === 'Sold')
                                    <span class="badge bg-danger">{{ $apartment->Status }}</span>
                                @elseif ($apartment->Status === 'Reserved')
                                    <span class="badge bg-warning">{{ $apartment->Status }}</span>
                                @else
                                    {{ $apartment->Status }}
                                @endif
                                <!-- Add more card text here -->
                            </p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('apartments.show', ['apartment' => $apartment->ApartmentsID]) }}" class="btn btn-primary">Show</a>
                                @if(auth()->user()->is_admin === 1)
                                    <a href="{{ route('apartments.edit', ['apartment' => $apartment->ApartmentsID]) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('apartments.destroy', ['apartment' => $apartment->ApartmentsID]) }}" method="POST">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchForm select, #searchForm input').on('change', function () {
            $('#searchForm').submit();
        });
    });
</script>

@endsection
