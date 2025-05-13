@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Reservation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.reservations.store') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="reservation_date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="reservation_date" type="date" class="form-control @error('reservation_date') is-invalid @enderror" name="reservation_date" value="{{ old('reservation_date') }}" required>

                                @error('reservation_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="reservation_time" class="col-md-4 col-form-label text-md-end">{{ __('Time') }}</label>

                            <div class="col-md-6">
                                <select id="reservation_time" class="form-control @error('reservation_time') is-invalid @enderror" name="reservation_time" required>
                                    <option value="">Select Time</option>
                                    @foreach(['12:00', '12:30', '13:00', '13:30', '14:00', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00'] as $time)
                                        <option value="{{ $time }}" {{ old('reservation_time') == $time ? 'selected' : '' }}>{{ $time }}</option>
                                    @endforeach
                                </select>

                                @error('reservation_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="guests" class="col-md-4 col-form-label text-md-end">{{ __('Number of Guests') }}</label>

                            <div class="col-md-6">
                                <input id="guests" type="number" min="1" max="20" class="form-control @error('guests') is-invalid @enderror" name="guests" value="{{ old('guests', 2) }}" required>

                                @error('guests')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="notes" class="col-md-4 col-form-label text-md-end">{{ __('Special Requests') }}</label>

                            <div class="col-md-6">
                                <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes') }}</textarea>

                                @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Reservation') }}
                                </button>
                                <a href="{{ route('dashboard.reservations') }}" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
