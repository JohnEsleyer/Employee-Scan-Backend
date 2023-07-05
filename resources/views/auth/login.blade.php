<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label>Username</label>
                            <input name="username" required>
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <button type="submit">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
