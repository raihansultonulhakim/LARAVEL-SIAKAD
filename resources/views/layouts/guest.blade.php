<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-r from-blue-500 to-indigo-600">

    <div class="min-h-screen flex flex-col items-center justify-center">
        <!-- Logo -->
        <div class="mb-6">
            <img src="{{ asset('img/LOGO_POLTEKAD.png') }}" alt="Logo SIAKAD" class="w-20 h-20">
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-md overflow-hidden rounded-xl">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
