<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-light">
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">
            <div class="mb-4">
                <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center">
                    <div class="bg-primary-gradient text-white rounded d-flex align-items-center justify-content-center me-2" style="width: 50px; height: 50px;">
                        <span class="fw-bold fs-4">IT</span>
                    </div>
                    <span class="fw-bold text-primary fs-4">Marketplace ITSE</span>
                </a>
            </div>

            <div class="w-100" style="max-width: 400px;">
                <div class="itse-card shadow-lg">
                    <div class="card-body p-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
