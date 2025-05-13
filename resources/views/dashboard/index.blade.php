@extends('layouts.app')

@section('content')
<div class="py-8 bg-amber-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 playfair mb-2">Welcome, {{ $user->name }}!</h1>
            <div class="h-1 w-24 bg-amber-600 mb-4"></div>
            <p class="text-gray-600">Here’s a quick overview of your activity and easy access to everything you need.</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="bg-amber-100 p-3 rounded-full mb-3">
                    <svg class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="text-2xl font-bold text-amber-700">{{ $reservationsCount }}</div>
                <div class="text-gray-600 mt-1">Reservations</div>
                <a href="{{ route('dashboard.reservations') }}" class="mt-3 text-sm text-amber-600 hover:underline">View All</a>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="bg-emerald-100 p-3 rounded-full mb-3">
                    <svg class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div class="text-2xl font-bold text-emerald-700">{{ $ordersCount }}</div>
                <div class="text-gray-600 mt-1">Orders</div>
                <a href="{{ route('dashboard.orders') }}" class="mt-3 text-sm text-emerald-600 hover:underline">Order History</a>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="bg-blue-100 p-3 rounded-full mb-3">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div class="text-lg font-semibold text-blue-700">Menu</div>
                <div class="text-gray-600 mt-1">Browse Dishes</div>
                <a href="{{ route('dashboard.menu') }}" class="mt-3 text-sm text-blue-600 hover:underline">View Menu</a>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="bg-purple-100 p-3 rounded-full mb-3">
                    <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="text-lg font-semibold text-purple-700">Profile</div>
                <div class="text-gray-600 mt-1">Manage Account</div>
                <a href="{{ route('dashboard.profile') }}" class="mt-3 text-sm text-purple-600 hover:underline">Edit Profile</a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow p-6 mb-10">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h2>
            <div class="flex flex-col md:flex-row gap-4">
                <a href="{{ route('dashboard.reservations.create') }}" class="flex-1 px-6 py-4 bg-amber-600 text-white rounded-lg text-center font-semibold hover:bg-amber-700 transition">Make Reservation</a>
                <a href="{{ route('dashboard.menu') }}" class="flex-1 px-6 py-4 bg-emerald-600 text-white rounded-lg text-center font-semibold hover:bg-emerald-700 transition">Order Food</a>
                <a href="{{ route('dashboard.cart') }}" class="flex-1 px-6 py-4 bg-blue-600 text-white rounded-lg text-center font-semibold hover:bg-blue-700 transition">View Cart</a>
            </div>
        </div>

        <!-- Recent Reservations -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Reservations</h2>
            @if(isset($recentReservations) && count($recentReservations) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guests</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($recentReservations as $reservation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($reservation->reservation_date ?? $reservation->date)->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($reservation->reservation_time ?? $reservation->time)->format('g:i A') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $reservation->guests ?? $reservation->party_size }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($reservation->status == 'confirmed')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                        @elseif($reservation->status == 'pending')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        @elseif($reservation->status == 'cancelled')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('dashboard.reservations.show', $reservation->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-12 bg-gray-50 rounded-lg">
                    <svg class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No reservations yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Make your first reservation to enjoy our delicious meals.</p>
                    <a href="{{ route('dashboard.reservations.create') }}" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                        Make Reservation
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
