<!-- app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Your Application</title>
    <!-- Include any necessary CSS or JS files here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Your navigation menu goes here -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

    <!-- Include any necessary JS files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
