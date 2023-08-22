@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PATCH')

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" value="{{ $user->firstName }}" required>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" value="{{ $user->lastName }}" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit">Update User</button>
    </form>
@endsection
