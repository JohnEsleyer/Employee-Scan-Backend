@extends('layouts.app')

@section('content')
    <div class="flex h-screen">
        <!-- Navigation Bar -->
        <div class="w-1/4 bg-white rounded-lg m-4 shadow-lg">
            <div class="p-4 flex justify-center">
                <span class="text-xl font-bold">Dashboard</span>
            </div>
            <div class="flex justify-center p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 bg-white flex">
            <!-- Section 1 -->
            <div class="w-1/3 bg-white rounded-lg m-4 shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Section 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut est nec ante congue congue.</p>
            </div>

            <!-- Section 2 -->
            <div class="w-1/3 bg-white rounded-lg m-4 shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Section 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut est nec ante congue congue.</p>
            </div>

            <!-- Section 3 -->
            <div class="w-1/3 bg-white rounded-lg m-4 shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Section 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut est nec ante congue congue.</p>
            </div>
        </div>
    </div>
@endsection
