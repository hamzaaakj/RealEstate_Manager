@extends('layouts.app')

@section('content')
<br>
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
                    <input type="hidden" name="residence_id" value="{{ $residenceID }}">
                    <a href="{{ route('apartments.index')  }}" class="btn btn-secondary btn-sm ms-2">Clear</a>
                </form>
                
            </div>
            
            <div class="col-md-6 mb-4 text-end">
                @if(auth()->user()->is_admin === 1)
                    <a href="{{ route('apartments.create') }}" class="btn btn-primary"><div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div></a>
                @endif
            </div>
        </div>

       
        <div class="row">
            @foreach($apartments as $apartment)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header no-border"><h5 class="card-title">Apartment Number: {{ $apartment->ApartmentsNumber }}</h5></div>
                        <div class="card-body">
                            <p class="card-text">
                                @if ($apartment->residence)
                                    Residence Name: {{ $apartment->residence->ResidenceName }}<br>
                                @endif
                                Size (sqm): {{ $apartment->SizeParSquareMeter }}<br>
                                Price per sqm: {{ $apartment->PriceParSquareMeter }}<br>
                                Total Price: {{ $apartment->TotalPrice }}<br>
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
