@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des réservations</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Token</th>
                    <th scope="col">Appartement</th>
                    <th scope="col">Residence</th>
                    <th scope="col">Commercial</th>
                 
                    <th scope="col">Prix final</th>
                    <th scope="col">Détails</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->client->token}} </td>
                        <td>{{ $reservation->apartment->ApartmentsNumber }}</td>
                        <td>{{ $reservation->apartment->residence->ResidenceName }}</td>
                        <td>{{ $reservation->commerciall->firstName}}</td>

                       
                        <td>{{ $reservation->finalPrice }}</td>
                        <td><a href="{{ route('orders.show', $reservation->id) }}">Détails</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 <!-- Pagination -->
 <nav aria-label="Page navigation" class="pagination-container">
    <ul class="pagination justify-content-center">
        @if ($reservations->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link" aria-hidden="true">&laquo; Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $reservations->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo; Précédent</span>
                </a>
            </li>
        @endif
        
        @for ($i = 1; $i <= $reservations->lastPage(); $i++)
            <li class="page-item {{ $i == $reservations->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $reservations->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        
        @if ($reservations->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $reservations->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">Suivant &raquo;</span>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link" aria-hidden="true">Next &raquo;</span>
            </li>
        @endif
    </ul>
</nav>
<!-- End Pagination -->
@endsection
