@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <label for="firstName">First Name</label>
    <input type="text" name="firstName" required>

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit">Create User</button>
</form>
@endsection