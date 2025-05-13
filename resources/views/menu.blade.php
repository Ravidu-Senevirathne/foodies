@extends('layouts.main')

@section('title', 'Our Full Menu')

@section('content')
<div class="bg-amber-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 playfair">Our Complete Menu</h1>
            <div class="h-1 w-24 bg-amber-600 mx-auto mt-4"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Explore our finest culinary creations, crafted with passion and premium ingredients</p>
        </div>
        
        <!-- Menu Categories Navigation -->
        <div class="flex flex-wrap justify-center gap-2 mb-12">
            <a href="#appetizers" class="px-4 py-2 bg-white rounded-full shadow text-amber-700 hover:bg-amber-600 hover:text-white transition">Appetizers</a>
            <a href="#pasta" class="px-4 py-2 bg-white rounded-full shadow text-amber-700 hover:bg-amber-600 hover:text-white transition">Pasta & Risotto</a>
            <a href="#mains" class="px-4 py-2 bg-white rounded-full shadow text-amber-700 hover:bg-amber-600 hover:text-white transition">Main Courses</a>
            <a href="#seafood" class="px-4 py-2 bg-white rounded-full shadow text-amber-700 hover:bg-amber-600 hover:text-white transition">Seafood</a>
            <a href="#desserts" class="px-4 py-2 bg-white rounded-full shadow text-amber-700 hover:bg-amber-600 hover:text-white transition">Desserts</a>
            <a href="#drinks" class="px-4 py-2 bg-white rounded-full shadow text-amber-700 hover:bg-amber-600 hover:text-white transition">Drinks</a>
        </div>
        
        <!-- Appetizers Section -->
        <section id="appetizers" class="mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 playfair">Appetizers</h2>
                <div class="h-1 w-16 bg-amber-600 mx-auto mt-2"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1626082927389-6cd097cee447?q=80&w=2070" alt="Bruschetta" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Bruschetta</h3>
                            <span class="text-amber-600 font-bold">$12</span>
                        </div>
                        <p class="text-gray-600">Toasted artisan bread topped with fresh tomatoes, basil, and extra virgin olive oil</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1541014741259-de529411b96a?q=80&w=2074" alt="Arancini" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Arancini</h3>
                            <span class="text-amber-600 font-bold">$14</span>
                        </div>
                        <p class="text-gray-600">Crispy risotto balls filled with mozzarella, served with truffle aioli</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1601311738622-62b42e7055db?q=80&w=1974" alt="Calamari" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Crispy Calamari</h3>
                            <span class="text-amber-600 font-bold">$16</span>
                        </div>
                        <p class="text-gray-600">Lightly battered and fried to perfection, served with lemon aioli</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Pasta Section -->
        <section id="pasta" class="mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 playfair">Pasta & Risotto</h2>
                <div class="h-1 w-16 bg-amber-600 mx-auto mt-2"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1539252554453-80ab65ce3586?q=80&w=1974" alt="Truffle Pasta" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Truffle Pasta</h3>
                            <span class="text-amber-600 font-bold">$24</span>
                        </div>
                        <p class="text-gray-600">Handmade pasta with creamy truffle sauce, wild mushrooms, and parmesan</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1473093226795-af9932fe5856?q=80&w=2070" alt="Seafood Pasta" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Seafood Linguine</h3>
                            <span class="text-amber-600 font-bold">$28</span>
                        </div>
                        <p class="text-gray-600">Fresh linguine with prawns, clams, and mussels in a light tomato sauce</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1619895092538-128341789043?q=80&w=2070" alt="Wild Mushroom Risotto" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Wild Mushroom Risotto</h3>
                            <span class="text-amber-600 font-bold">$22</span>
                        </div>
                        <p class="text-gray-600">Arborio rice with porcini mushrooms, white wine and aged parmesan</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Main Courses Section -->
        <section id="mains" class="mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 playfair">Main Courses</h2>
                <div class="h-1 w-16 bg-amber-600 mx-auto mt-2"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=2069" alt="Prime Ribeye" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Prime Ribeye</h3>
                            <span class="text-amber-600 font-bold">$38</span>
                        </div>
                        <p class="text-gray-600">Aged prime ribeye steak with herb butter, roasted potatoes, and seasonal vegetables</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1569058242253-92a9c755a0ec?q=80&w=2070" alt="Roasted Chicken" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Herb Roasted Chicken</h3>
                            <span class="text-amber-600 font-bold">$26</span>
                        </div>
                        <p class="text-gray-600">Free-range chicken with garlic mashed potatoes and rosemary jus</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1547424450-75ec164925ad?q=80&w=2070" alt="Lamb Chops" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Rack of Lamb</h3>
                            <span class="text-amber-600 font-bold">$42</span>
                        </div>
                        <p class="text-gray-600">Herb-crusted lamb rack with mint pesto, sweet potato puree, and balsamic reduction</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Seafood Section -->
        <section id="seafood" class="mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 playfair">Seafood</h2>
                <div class="h-1 w-16 bg-amber-600 mx-auto mt-2"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1603073163308-9654c3fb2852?q=80&w=2070" alt="Grilled Salmon" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Grilled Salmon</h3>
                            <span class="text-amber-600 font-bold">$28</span>
                        </div>
                        <p class="text-gray-600">Fresh Atlantic salmon, lemon dill sauce, wild rice, and grilled asparagus</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?q=80&w=2071" alt="Seared Scallops" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Seared Scallops</h3>
                            <span class="text-amber-600 font-bold">$34</span>
                        </div>
                        <p class="text-gray-600">Pan-seared scallops with cauliflower puree, crispy pancetta, and microgreens</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070" alt="Lobster" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Grilled Lobster Tail</h3>
                            <span class="text-amber-600 font-bold">$48</span>
                        </div>
                        <p class="text-gray-600">Maine lobster tail with drawn butter, truffled mashed potatoes, and grilled vegetables</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Desserts Section -->
        <section id="desserts" class="mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 playfair">Desserts</h2>
                <div class="h-1 w-16 bg-amber-600 mx-auto mt-2"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1470124182917-cc6e71b22ecc?q=80&w=2070" alt="Tiramisu" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Tiramisu</h3>
                            <span class="text-amber-600 font-bold">$12</span>
                        </div>
                        <p class="text-gray-600">Classic Italian dessert with coffee-soaked ladyfingers and mascarpone cream</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&w=1957" alt="Chocolate Lava Cake" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Chocolate Lava Cake</h3>
                            <span class="text-amber-600 font-bold">$14</span>
                        </div>
                        <p class="text-gray-600">Warm chocolate cake with a molten center, served with vanilla bean ice cream</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?q=80&w=1974" alt="Crème Brûlée" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Crème Brûlée</h3>
                            <span class="text-amber-600 font-bold">$10</span>
                        </div>
                        <p class="text-gray-600">Rich vanilla custard topped with caramelized sugar and seasonal berries</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Drinks Section -->
        <section id="drinks">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 playfair">Drinks</h2>
                <div class="h-1 w-16 bg-amber-600 mx-auto mt-2"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-5">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1527661591475-527312dd65f5?q=80&w=1974" alt="Wine" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Wine Selection</h3>
                            <span class="text-amber-600 font-bold">$10-180</span>
                        </div>
                        <p class="text-gray-600">Extensive wine list featuring local and international selections. Ask your server for recommendations.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1536935338788-846bb9981813?q=80&w=1972" alt="Cocktails" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Signature Cocktails</h3>
                            <span class="text-amber-600 font-bold">$14-18</span>
                        </div>
                        <p class="text-gray-600">Handcrafted cocktails made with premium spirits and fresh ingredients</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1586195831800-24f14c992cea?q=80&w=1974" alt="Coffee" class="w-full menu-item-img">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">Specialty Coffees</h3>
                            <span class="text-amber-600 font-bold">$5-8</span>
                        </div>
                        <p class="text-gray-600">Locally roasted coffee, espresso drinks, and after-dinner coffee cocktails</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Back link and reservation button -->
        <div class="mt-16 flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="/" class="px-6 py-3 bg-white text-amber-700 font-semibold rounded border border-amber-600 hover:bg-amber-50 transition">Back to Home</a>
            <a href="#reservation" class="px-6 py-3 bg-amber-600 text-white font-semibold rounded hover:bg-amber-700 transition">Make a Reservation</a>
        </div>
    </div>
</div>
@endsection