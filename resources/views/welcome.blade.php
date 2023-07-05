@extends('layouts.app')

@section('content')
    <div class="flex h-screen overflow-y-scroll">
        <!-- Left Section -->
        <div class="w-1/3 bg-white shadow-md rounded p-8">
            <h1 class="text-3xl font-bold mb-4">Welcome to the Landing Page</h1>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut est nec ante congue congue.</p>
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Login
            </a>
        </div>

        <!-- Right Section -->
        <div class="w-2/3 bg-white p-8">
            <h2 class="text-2xl font-bold mb-4">Section 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut est nec ante congue congue.</p>

            <h2 class="text-2xl font-bold mt-8 mb-4">Section 2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut est nec ante congue congue.</p>

            <h2 class="text-2xl font-bold mt-8 mb-4">Section 3</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut est nec ante congue congue.</p>

            <!-- Add more sections as needed -->
        </div>
    </div>
@endsection
