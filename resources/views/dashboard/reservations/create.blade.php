@extends('layouts.app')

@section('content')
<div class="py-10 bg-amber-50 min-h-screen">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-2xl border border-amber-100 p-8">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-800 playfair mb-2">Make a New Reservation</h1>
                <div class="h-1 w-24 bg-amber-600 mx-auto"></div>
                <p class="mt-4 text-gray-600">Reserve your table and enjoy a wonderful dining experience!</p>
            </div>
            <form method="POST" action="{{ route('dashboard.reservations.store') }}">
                @csrf

                <div class="mb-5">
                    <label for="reservation_date" class="block text-gray-700 font-medium mb-2">Date</label>
                    <input id="reservation_date" type="date" name="reservation_date" value="{{ old('reservation_date') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 @error('reservation_date') border-red-500 @enderror">
                    @error('reservation_date')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="reservation_time" class="block text-gray-700 font-medium mb-2">Time</label>
                    <select id="reservation_time" name="reservation_time" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 @error('reservation_time') border-red-500 @enderror">
                        <option value="">Select Time</option>
                        @foreach(['12:00', '12:30', '13:00', '13:30', '14:00', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00'] as $time)
                            <option value="{{ $time }}" {{ old('reservation_time') == $time ? 'selected' : '' }}>{{ $time }}</option>
                        @endforeach
                    </select>
                    @error('reservation_time')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="party_size" class="block text-gray-700 font-medium mb-2">Number of Guests</label>
                    <input id="party_size" type="number" min="1" max="20" name="party_size" value="{{ old('party_size', 2) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 @error('party_size') border-red-500 @enderror">
                    @error('party_size')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="special_requests" class="block text-gray-700 font-medium mb-2">Special Requests</label>
                    <textarea id="special_requests" name="special_requests" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 @error('special_requests') border-red-500 @enderror"
                    >{{ old('special_requests') }}</textarea>
                    @error('special_requests')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <button type="submit"
                        class="flex-1 bg-amber-600 text-white font-semibold py-3 rounded-lg hover:bg-amber-700 transition shadow-lg">
                        Create Reservation
                    </button>
                    <a href="{{ route('dashboard.reservations') }}"
                        class="flex-1 bg-gray-100 text-amber-700 font-semibold py-3 rounded-lg border border-amber-300 hover:bg-gray-200 transition text-center shadow">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
