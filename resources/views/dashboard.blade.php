@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <!-- Add your dashboard content here -->

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>

    </div>
@endsection
