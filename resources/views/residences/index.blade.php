@extends('layouts.app')

@section('content')
<br>
    <h1>Residences List</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <!-- Search Bar -->
            <form id="searchForm" action="{{ route('residences.index') }}" method="GET" class="d-flex align-items-center">
                <div class="input-group">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by residence name">
                </div>
                <a href="{{ route('residences.index') }}" class="btn btn-secondary btn-sm ms-2">Clear</a>
            </form>
        </div>
        <div class="col-md-6 mb-4 text-end">
            @if(auth()->user()->is_admin === 1)
            <a href="{{ route('residences.create') }}" class="btn btn-primary"><div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div></a>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach($residences as $residence)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header no-border">
                        <h5 class="card-title">{{ $residence->ResidenceName }}</h5>
                    </div>
                    <div class="card-body">
                        
                        <p class="card-text">
                            <strong> Residence Number: </strong>{{ $residence->ResidenceNumber }}<br>
                           <strong> Number of Apartments:</strong> {{ $residence->apartments_count }}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('apartments.index', ['residence_id' => $residence->ResidenceID]) }}" class="btn btn-primary">View Apartments</a>
                       
                                <a href="{{ route('residences.show', ['residence' => $residence->ResidenceID]) }}" class="btn btn-secondary">Show</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchForm input').on('change', function () {
            $('#searchForm').submit();
        });
    });
</script>
    
@endsection
