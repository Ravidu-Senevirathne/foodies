@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My Orders') }}</div>

                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('M d, Y g:i A') }}</td>
                                        <td>{{ $order->items_count }} items</td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td>
                                            @if($order->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($order->status == 'completed')
                                                <span class="badge bg-success">Completed</span>
                                            @elseif($order->status == 'cancelled')
                                                <span class="badge bg-danger">Cancelled</span>
                                            @elseif($order->status == 'processing')
                                                <span class="badge bg-info">Processing</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">View Details</a>
                                            @if($order->status == 'pending')
                                                <button class="btn btn-sm btn-danger">Cancel</button>
                                            @endif
                                            @if(in_array($order->status, ['completed', 'processing']))
                                                <button class="btn btn-sm btn-success">Reorder</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            {{ $orders->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <h4>You don't have any orders yet.</h4>
                            <a href="{{ route('dashboard.menu') }}" class="btn btn-primary mt-3">Browse Our Menu</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
