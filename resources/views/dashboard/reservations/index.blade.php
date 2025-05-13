@extends('layouts.app')

@section('content')
<div class="py-8 bg-amber-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Stylish Header -->
        <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="bg-amber-100 p-3 rounded-full shadow">
                    <svg class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 playfair mb-1">My Reservations</h1>
                    <div class="h-1 w-24 bg-amber-600"></div>
                </div>
            </div>
            <a href="{{ route('dashboard.reservations.create') }}" class="px-8 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-semibold rounded-lg shadow-lg hover:from-amber-600 hover:to-amber-700 transition flex items-center w-full md:w-auto justify-center text-lg">
                <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                New Reservation
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(isset($reservations) && count($reservations) > 0)
            <div class="overflow-x-auto bg-white rounded-2xl shadow-2xl border border-amber-100">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gradient-to-r from-amber-100 to-amber-200">
                        <tr>
                            <th class="px-6 py-4 border-b border-gray-200 text-left text-xs font-bold text-amber-700 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 border-b border-gray-200 text-left text-xs font-bold text-amber-700 uppercase tracking-wider">Time</th>
                            <th class="px-6 py-4 border-b border-gray-200 text-left text-xs font-bold text-amber-700 uppercase tracking-wider">Guests</th>
                            <th class="px-6 py-4 border-b border-gray-200 text-left text-xs font-bold text-amber-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 border-b border-gray-200 text-left text-xs font-bold text-amber-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($reservations as $reservation)
                        <tr class="hover:bg-amber-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-base text-gray-700 font-semibold">
                                {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-gray-700 font-semibold">
                                {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-gray-700 font-semibold">
                                {{ $reservation->party_size }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($reservation->status == 'confirmed')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 shadow">Confirmed</span>
                                @elseif($reservation->status == 'pending')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-yellow-100 text-yellow-800 shadow">Pending</span>
                                @elseif($reservation->status == 'cancelled')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 shadow">Cancelled</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('dashboard.reservations.show', $reservation->id) }}" class="text-blue-600 hover:text-blue-900" title="View">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('dashboard.reservations.edit', $reservation->id) }}" class="text-amber-600 hover:text-amber-900" title="Edit">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    @if($reservation->status != 'cancelled')
                                        <form action="{{ route('dashboard.reservations.cancel', $reservation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-600 hover:text-red-900" title="Cancel" onclick="return confirm('Are you sure you want to cancel this reservation?')">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                @if(method_exists($reservations, 'links'))
                    {{ $reservations->links() }}
                @endif
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20 bg-white rounded-2xl shadow-2xl border border-amber-100 mt-10">
                <svg class="h-20 w-20 text-amber-300 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-2xl font-bold text-gray-900">No Reservations Found</h3>
                <p class="mt-2 text-lg text-gray-500 text-center max-w-md">
                    You haven't made any reservations yet.<br>
                    Reserve a table now and enjoy our delicious cuisine in a beautiful setting!
                </p>
                <a href="{{ route('dashboard.reservations.create') }}" class="mt-8 inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-lg text-lg font-semibold text-white bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition">
                    <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Make Your First Reservation
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
