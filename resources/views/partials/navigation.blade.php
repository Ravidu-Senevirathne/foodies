<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-amber-600 playfair">Delicious</a>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="#about" class="text-gray-700 hover:text-amber-600 transition">About</a>
                <a href="#menu" class="text-gray-700 hover:text-amber-600 transition">Menu</a>
                <a href="#gallery" class="text-gray-700 hover:text-amber-600 transition">Gallery</a>
                <a href="#contact" class="text-gray-700 hover:text-amber-600 transition">Contact</a>
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md bg-amber-600 text-white hover:bg-amber-700 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-amber-600 transition">Log in</a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-amber-600 text-white hover:bg-amber-700 transition">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
            
            <div class="flex items-center md:hidden">
                <button class="text-gray-700" id="mobile-menu-button">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div class="hidden md:hidden bg-white shadow-lg" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#about" class="block px-3 py-2 text-gray-700 hover:bg-amber-100 hover:text-amber-600 transition">About</a>
            <a href="#menu" class="block px-3 py-2 text-gray-700 hover:bg-amber-100 hover:text-amber-600 transition">Menu</a>
            <a href="#gallery" class="block px-3 py-2 text-gray-700 hover:bg-amber-100 hover:text-amber-600 transition">Gallery</a>
            <a href="#contact" class="block px-3 py-2 text-gray-700 hover:bg-amber-100 hover:text-amber-600 transition">Contact</a>
            
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="block px-3 py-2 text-gray-700 hover:bg-amber-100 hover:text-amber-600 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:bg-amber-100 hover:text-amber-600 transition">Log in</a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-gray-700 hover:bg-amber-100 hover:text-amber-600 transition">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>