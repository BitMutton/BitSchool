<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Teacher Timetable')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- if using Vite -->
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-white shadow p-4">
        <h1 class="text-xl font-bold">School Management System</h1>
    </header>

    <main class="p-4">
        @yield('content') <!-- Page-specific content goes here -->
    </main>

    <footer class="bg-white shadow p-4 text-center">
        &copy; {{ date('Y') }} My School
    </footer>

    @livewireScripts
</body>
</html>

