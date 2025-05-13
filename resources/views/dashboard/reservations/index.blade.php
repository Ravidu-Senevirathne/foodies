@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('My Reservations') }}</span>
                    <a href="{{ route('dashboard.reservations.create') }}" class="btn btn-primary btn-sm">New Reservation</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if($reservations->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Guests</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('M d, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }}</td>
                                        <td>{{ $reservation->guests }}</td>
                                        <td>
                                            @if($reservation->status == 'confirmed')
                                                <span class="badge bg-success">Confirmed</span>
                                            @elseif($reservation->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($reservation->status == 'cancelled')
                                                <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">View</a>
                                            <a href="#" class="btn btn-sm btn-warning">Modify</a>
                                            <button class="btn btn-sm btn-danger">Cancel</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            {{ $reservations->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <h4>You don't have any reservations yet.</h4>
                            <a href="{{ route('dashboard.reservations.create') }}" class="btn btn-primary mt-3">Make Your First Reservation</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
