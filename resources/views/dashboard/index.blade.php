@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h2>Welcome, {{ $user->name }}!</h2>
                    
                    <div class="row mt-4">
                        <div class="col-md-3 mb-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Reservations</h5>
                                    <p class="card-text display-4">{{ $reservationsCount }}</p>
                                    <a href="{{ route('dashboard.reservations') }}" class="btn btn-light">View All</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Menu</h5>
                                    <p class="card-text">Explore our delicious options</p>
                                    <a href="{{ route('dashboard.menu') }}" class="btn btn-light">View Menu</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Orders</h5>
                                    <p class="card-text display-4">{{ $ordersCount }}</p>
                                    <a href="{{ route('dashboard.orders') }}" class="btn btn-light">Order History</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-4">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Profile</h5>
                                    <p class="card-text">Update your information</p>
                                    <a href="{{ route('dashboard.profile') }}" class="btn btn-light">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3>Quick Actions</h3>
                        <div class="list-group">
                            <a href="{{ route('dashboard.reservations.create') }}" class="list-group-item list-group-item-action">
                                <i class="fa fa-calendar-plus"></i> Make New Reservation
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fa fa-utensils"></i> Place New Order
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
