<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Delicious') }} - Fine Dining Restaurant</title>

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
    </head>
    <body class="font-sans antialiased">
        <!-- Navigation -->
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

        <!-- Hero Section -->
        <section class="hero-section h-screen flex items-center justify-center text-white">
            <div class="text-center px-4">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 playfair">Delicious</h1>
                <p class="text-xl md:text-2xl mb-8">Experience fine dining like never before</p>
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <a href="#menu" class="px-6 py-3 bg-amber-600 text-white font-semibold rounded hover:bg-amber-700 transition">View Menu</a>
                    <a href="#reservation" class="px-6 py-3 bg-transparent border-2 border-white text-white font-semibold rounded hover:bg-white hover:text-amber-800 transition">Reserve a Table</a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 playfair">Our Story</h2>
                    <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-semibold mb-4 text-gray-800">A Tradition of Excellence</h3>
                        <p class="text-gray-600 mb-4">Welcome to Delicious, where culinary mastery meets warm hospitality. Established in 2010, our restaurant has been serving exceptional dishes created with locally-sourced ingredients and international flavors.</p>
                        <p class="text-gray-600 mb-6">Our team of award-winning chefs brings creativity and passion to every plate, ensuring a memorable dining experience for all our guests.</p>
                        <a href="#" class="text-amber-600 font-semibold hover:text-amber-800 transition">Learn more about our journey →</a>
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?q=80&w=2070" alt="Restaurant interior" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- Menu Section -->
        <section id="menu" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 playfair">Our Menu</h2>
                    <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Discover our selection of dishes prepared with love and attention to detail</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Menu Item 1 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1539252554453-80ab65ce3586?q=80&w=1974" alt="Pasta dish" class="w-full menu-item-img">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-xl font-bold text-gray-800">Truffle Pasta</h3>
                                <span class="text-amber-600 font-bold">$24</span>
                            </div>
                            <p class="text-gray-600">Handmade pasta with creamy truffle sauce, wild mushrooms, and parmesan</p>
                        </div>
                    </div>
                    
                    <!-- Menu Item 2 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=2069" alt="Steak dish" class="w-full menu-item-img">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-xl font-bold text-gray-800">Prime Ribeye</h3>
                                <span class="text-amber-600 font-bold">$38</span>
                            </div>
                            <p class="text-gray-600">Aged prime ribeye steak with herb butter, roasted potatoes, and seasonal vegetables</p>
                        </div>
                    </div>
                    
                    <!-- Menu Item 3 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1603073163308-9654c3fb2852?q=80&w=2070" alt="Seafood dish" class="w-full menu-item-img">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-xl font-bold text-gray-800">Grilled Salmon</h3>
                                <span class="text-amber-600 font-bold">$28</span>
                            </div>
                            <p class="text-gray-600">Fresh Atlantic salmon, lemon dill sauce, wild rice, and grilled asparagus</p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-12">
                    <a href="#" class="px-6 py-3 bg-amber-600 text-white font-semibold rounded hover:bg-amber-700 transition">View Full Menu</a>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 playfair">Food Gallery</h2>
                    <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1780" alt="Food image" class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=1981" alt="Food image" class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?q=80&w=1980" alt="Food image" class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?q=80&w=1974" alt="Food image" class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?q=80&w=2070" alt="Food image" class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?q=80&w=2070" alt="Food image" class="w-full h-64 object-cover hover:scale-110 transition duration-500">
                    </div>
                </div>
            </div>
        </section>

        <!-- Reservation Section -->
        <section id="reservation" class="py-16 bg-amber-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 playfair">Make a Reservation</h2>
                    <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Book your table online and enjoy a memorable dining experience</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-xl overflow-hidden max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-8">
                            <form>
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                                    <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                                </div>
                                <div class="mb-4">
                                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                    <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-4">
                                        <label for="date" class="block text-gray-700 font-medium mb-2">Date</label>
                                        <input type="date" id="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time" class="block text-gray-700 font-medium mb-2">Time</label>
                                        <input type="time" id="time" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="guests" class="block text-gray-700 font-medium mb-2">Number of Guests</label>
                                    <select id="guests" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'person' : 'people' }}</option>
                                        @endfor
                                        <option value="more">More than 10</option>
                                    </select>
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="w-full bg-amber-600 text-white font-semibold py-3 rounded hover:bg-amber-700 transition">Book Table</button>
                                </div>
                            </form>
                        </div>
                        <div class="bg-amber-700 text-white p-8 flex flex-col justify-center">
                            <h3 class="text-2xl font-bold mb-6 playfair">Opening Hours</h3>
                            <ul class="space-y-3">
                                <li class="flex justify-between">
                                    <span>Monday - Friday</span>
                                    <span>12:00 - 23:00</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Saturday</span>
                                    <span>12:00 - 00:00</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Sunday</span>
                                    <span>12:00 - 22:00</span>
                                </li>
                            </ul>
                            
                            <div class="mt-8">
                                <h3 class="text-2xl font-bold mb-4 playfair">Contact</h3>
                                <p class="mb-2">123 Restaurant Street</p>
                                <p class="mb-2">City, Country</p>
                                <p class="mb-2">Phone: (123) 456-7890</p>
                                <p>Email: info@delicious.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 playfair">What Our Guests Say</h2>
                    <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-50 p-8 rounded-lg shadow">
                        <div class="flex items-center mb-4">
                            <div class="text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 italic mb-4">"The food at Delicious was absolutely amazing. The flavors were unique and the presentation was beautiful. The staff was attentive and knowledgeable about the menu items."</p>
                        <div class="font-semibold text-gray-800">- Sarah Johnson</div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="bg-gray-50 p-8 rounded-lg shadow">
                        <div class="flex items-center mb-4">
                            <div class="text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 italic mb-4">"We celebrated our anniversary here and it was perfect. The atmosphere was elegant yet comfortable, and the wine pairing suggestions were spot on. Would definitely recommend for special occasions."</p>
                        <div class="font-semibold text-gray-800">- Michael Brown</div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="bg-gray-50 p-8 rounded-lg shadow">
                        <div class="flex items-center mb-4">
                            <div class="text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 italic mb-4">"As a vegetarian, I'm often limited in fine dining restaurants, but Delicious surprised me with their creative plant-based dishes. The flavors were complex and satisfying. Can't wait to return!"</p>
                        <div class="font-semibold text-gray-800">- Emily Wilson</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 playfair">Contact Us</h2>
                    <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Have questions or feedback? We'd love to hear from you!</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <iframe class="w-full h-96 rounded-lg shadow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.952912260219!2d3.375295414770757!3d6.5276316952596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2ae68280c1%3A0xdc9e87a367c3d9cb!2sLagos%2C%20Nigeria!5e0!3m2!1sen!2sus!4v1641389077535" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div>
                        <form class="bg-white p-8 rounded-lg shadow">
                            <div class="mb-4">
                                <label for="contact-name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                                <input type="text" id="contact-name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div class="mb-4">
                                <label for="contact-email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                <input type="email" id="contact-email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div class="mb-4">
                                <label for="contact-subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                                <input type="text" id="contact-subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div class="mb-4">
                                <label for="contact-message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                                <textarea id="contact-message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="w-full bg-amber-600 text-white font-semibold py-3 rounded hover:bg-amber-700 transition">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4 playfair">Delicious</h3>
                        <p class="text-gray-400">Experience fine dining in a warm and elegant atmosphere with exceptional service and unforgettable cuisine.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4 playfair">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-amber-500 transition">Home</a></li>
                            <li><a href="#about" class="text-gray-400 hover:text-amber-500 transition">About Us</a></li>
                            <li><a href="#menu" class="text-gray-400 hover:text-amber-500 transition">Menu</a></li>
                            <li><a href="#reservation" class="text-gray-400 hover:text-amber-500 transition">Reservations</a></li>
                            <li><a href="#contact" class="text-gray-400 hover:text-amber-500 transition">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4 playfair">Contact Info</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li>123 Restaurant Street</li>
                            <li>City, Country</li>
                            <li>Phone: (123) 456-7890</li>
                            <li>Email: info@delicious.com</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4 playfair">Opening Hours</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li>Monday - Friday: 12:00 - 23:00</li>
                            <li>Saturday: 12:00 - 00:00</li>
                            <li>Sunday: 12:00 - 22:00</li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-400 mb-4 md:mb-0">
                        &copy; {{ date('Y') }} Delicious Restaurant. All rights reserved.
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-amber-500 transition">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-amber-500 transition">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-amber-500 transition">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JavaScript for Mobile Menu Toggle -->
        <script>
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>