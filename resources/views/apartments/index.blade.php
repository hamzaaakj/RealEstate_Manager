@extends('layouts.app')

@section('content')
    <h1>Apartments List</h1>
    <table>
        <thead>
            <tr>
                <th>Apartment Number</th>
                <th>Size (sqm)</th>
                <th>Price per sqm</th>
                <!-- Add more table headers here -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartments as $apartment)
                <tr>
                    <td>{{ $apartment->ApartmentsNumber }}</td>
                    <td>{{ $apartment->SizeParSquareMeter }}</td>
                    <td>{{ $apartment->PriceParSquareMeter }}</td>
                    <!-- Add more table cells here -->
                    <td>
                        <a href="{{ route('apartments.show', ['apartment' => $apartment->ApartmentsID]) }}">Show</a>
                        @if(auth()->user()->is_admin === 1)
                        <a href="{{ route('apartments.edit', ['apartment' => $apartment->ApartmentsID]) }}">Edit</a>
                        <form action="{{ route('apartments.destroy', ['apartment' => $apartment->ApartmentsID]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
