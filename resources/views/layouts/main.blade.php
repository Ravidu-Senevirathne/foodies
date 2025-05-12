<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Foodies') }} - @yield('title', 'Fine Dining Restaurant')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|playfair-display:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Additional styles -->
        <style>
            .hero-section {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070');
                background-size: cover;
                background-position: center;
            }
            
            .menu-item-img {
                height: 250px;
                object-fit: cover;
            }
            
            .playfair {
                font-family: 'Playfair Display', serif;
            }
        </style>
        
        @yield('additional-styles')
    </head>
    <body class="font-sans antialiased">
        @include('partials.navigation')

        @yield('content')

        @include('partials.footer')

        <!-- JavaScript for Mobile Menu Toggle -->
        <script>
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
        </script>
        
        @yield('scripts')
    </body>
</html>