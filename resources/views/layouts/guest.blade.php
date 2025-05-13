<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .playfair {
                font-family: 'Playfair Display', serif;
            }
            
            .bg-gradient-custom {
                background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
                background-size: 400% 400%;
                animation: gradient 15s ease infinite;
            }
            
            @keyframes gradient {
                0% {background-position: 0% 50%;}
                50% {background-position: 100% 50%;}
                100% {background-position: 0% 50%;}
            }
            
            .logo-hover {
                transition: all 0.3s ease;
            }
            
            .logo-hover:hover {
                transform: scale(1.05);
                filter: drop-shadow(0 0 8px rgba(251, 191, 36, 0.4));
            }
            
            .auth-decoration {
                position: absolute;
                width: 200px;
                height: 200px;
                background-color: rgba(251, 191, 36, 0.1);
                border-radius: 50%;
                z-index: -1;
            }
            
            .auth-decoration-1 {
                top: 10%;
                left: 15%;
            }
            
            .auth-decoration-2 {
                bottom: 10%;
                right: 15%;
                width: 300px;
                height: 300px;
            }
            
            .decoration-icon {
                position: absolute;
                opacity: 0.07;
                z-index: -1;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Decorative elements -->
        <div class="auth-decoration auth-decoration-1"></div>
        <div class="auth-decoration auth-decoration-2"></div>
        
        <!-- Decorative food icons -->
        <div class="decoration-icon" style="top: 20%; left: 5%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="text-amber-800" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
        </div>
        <div class="decoration-icon" style="top: 50%; right: 8%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="text-amber-800" viewBox="0 0 16 16">
                <path d="M1.5 2.5A1.5 1.5 0 0 1 3 1h10a1.5 1.5 0 0 1 1.5 1.5v3.55a.5.5 0 0 1-.5.5H13a5 5 0 0 1-10 0H1.5a.5.5 0 0 1-.5-.5V2.5zM3 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-3A.5.5 0 0 0 12 2H3z"/>
                <path d="M11.434 4H4.566A4.5 4.5 0 0 0 8 12.5h.5a4.5 4.5 0 0 0 3.434-8.5z"/>
            </svg>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-custom">
            <div class="mb-6 text-center">
                <a href="/" class="logo-hover inline-block">
                    <span class="text-4xl font-bold text-amber-700 playfair">Foodies</span>
                    <div class="h-1 w-16 bg-amber-600 mx-auto mt-1"></div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-8 bg-white shadow-xl overflow-hidden sm:rounded-xl border border-amber-100">
                {{ $slot }}
            </div>
            
            <div class="mt-6 text-sm text-gray-600 text-center">
                <p>© {{ date('Y') }} Foodies Restaurant. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>
