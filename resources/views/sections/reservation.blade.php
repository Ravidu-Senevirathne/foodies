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
