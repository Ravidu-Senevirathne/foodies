<!-- filepath: d:\Projects\Practice\lara-practice\resources\views\dashboard\reservations\show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="py-8 bg-amber-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back button -->
        <div class="mb-6">
            <a href="{{ route('dashboard.reservations') }}" class="flex items-center text-amber-700 hover:text-amber-900 transition">
                <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Reservations
            </a>
        </div>

        <!-- Header -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="bg-amber-100 p-3 rounded-full shadow">
                    <svg class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 playfair mb-1">Reservation Details</h1>
                    <div class="h-1 w-24 bg-amber-600"></div>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('dashboard.reservations.edit', $reservation->id) }}" class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg shadow transition">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Reservation
                </a>
                @if($reservation->status != 'cancelled')
                <form action="{{ route('dashboard.reservations.cancel', $reservation->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition" onclick="return confirm('Are you sure you want to cancel this reservation?')">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel Reservation
                    </button>
                </form>
                @endif
            </div>
        </div>

        <!-- Reservation Details Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-amber-100 overflow-hidden">
            <!-- Status Banner -->
            @if($reservation->status == 'confirmed')
                <div class="bg-green-100 border-b border-green-200 px-6 py-3 flex items-center">
                    <svg class="h-6 w-6 text-green-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold text-green-800">Your reservation is confirmed</span>
                </div>
            @elseif($reservation->status == 'pending')
                <div class="bg-yellow-100 border-b border-yellow-200 px-6 py-3 flex items-center">
                    <svg class="h-6 w-6 text-yellow-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold text-yellow-800">Your reservation is pending confirmation</span>
                </div>
            @elseif($reservation->status == 'cancelled')
                <div class="bg-red-100 border-b border-red-200 px-6 py-3 flex items-center">
                    <svg class="h-6 w-6 text-red-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span class="font-semibold text-red-800">This reservation has been cancelled</span>
                </div>
            @endif

            <!-- Details -->
            <div class="p-6 md:p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left column - Basic Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Reservation Information</h3>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Date</dt>
                                <dd class="mt-1 text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('l, F j, Y') }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Time</dt>
                                <dd class="mt-1 text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Party Size</dt>
                                <dd class="mt-1 text-lg font-semibold text-gray-900">
                                    {{ $reservation->party_size }} {{ Str::plural('person', $reservation->party_size) }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Reservation ID</dt>
                                <dd class="mt-1 text-sm font-mono text-gray-900">
                                    #{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Created</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ \Carbon\Carbon::parse($reservation->created_at)->format('M d, Y \a\t g:i A') }}
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Right column - Contact & Special Requests -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Contact Information</h3>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-gray-900">{{ $reservation->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-gray-900">{{ $reservation->email }}</dd>
                            </div>
                            @if($reservation->phone)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                <dd class="mt-1 text-gray-900">{{ $reservation->phone }}</dd>
                            </div>
                            @endif
                        </dl>

                        @if($reservation->special_requests)
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Special Requests</h3>
                            <div class="bg-gray-50 rounded-lg p-4 text-gray-800">
                                {{ $reservation->special_requests }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                @if($reservation->notes)
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Notes</h3>
                    <div class="bg-gray-50 rounded-lg p-4 text-gray-800">
                        {{ $reservation->notes }}
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Action buttons at bottom -->
        <div class="mt-8 flex flex-wrap justify-between gap-4">
            <a href="{{ route('dashboard.reservations') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                Back to All Reservations
            </a>
            <div class="flex gap-2">
                @if($reservation->status != 'cancelled')
                <form action="{{ route('dashboard.reservations.delete', $reservation->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to permanently delete this reservation?')">
                        Delete Permanently
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection