@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-200">

     <!-- Navigation Bar -->
     <div id="navbar" class="w-1/4 dark:bg-gray-800 text-white shadow-lg">
        <!-- Your content here -->
        @include('layouts.navbar')
        </div>
        <script>
    window.addEventListener('resize', function() {
        var element = document.getElementById('navbar');
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (screenWidth < 640) { // Adjust the breakpoint as needed
        element.classList.add('hidden');
        } else {
        element.classList.remove('hidden');
        }
    });
    </script>

</div>
@endsection
