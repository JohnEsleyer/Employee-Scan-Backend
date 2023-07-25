<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Your Application') }}</title>
    <!-- Include your CSS stylesheets and JavaScript files here -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Your navigation bar or header section -->
    <header>
        <!-- Place your logo, navigation links, etc. here -->
    </header>

    <!-- The main content of each page -->
    <main>
        @yield('content')
    </main>

    <!-- Your footer section -->
    <footer>
        <!-- Place your footer content here -->
    </footer>

    <!-- Include your JavaScript files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
