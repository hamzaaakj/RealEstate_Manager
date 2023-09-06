@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clients</h1>
    <a class="btn btn-primary" href="{{ route('clients.create') }}">Create New Client</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Token</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Commercial</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->token }}</td>
                    <td>{{ $client->firstName }}</td>
                    <td>{{ $client->lastName }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->tele }}</td>
                    <td>{{ $client->user->firstName . ' ' . $client->user->lastName }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('clients.edit', $client->id) }}"><i class="fa-solid fa-user-pen"></i></a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ms-2"><i class="fa-solid fa-user-slash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
