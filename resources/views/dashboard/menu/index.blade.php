@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <ul class="nav nav-tabs mb-4" id="menuTabs" role="tablist">
                        @foreach($menuItems->keys() as $index => $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                                id="{{ Str::slug($category) }}-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#{{ Str::slug($category) }}" 
                                type="button" 
                                role="tab">{{ ucfirst($category) }}</button>
                        </li>
                        @endforeach
                    </ul>
                    
                    <div class="tab-content" id="menuTabContent">
                        @foreach($menuItems->keys() as $index => $category)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                            id="{{ Str::slug($category) }}" 
                            role="tabpanel">
                            
                            <div class="row">
                                @foreach($menuItems[$category] as $item)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        @if($item->image)
                                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                                        @endif
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <span class="badge bg-primary">${{ number_format($item->price, 2) }}</span>
                                            </div>
                                            <p class="card-text">{{ $item->description }}</p>
                                            <button class="btn btn-sm btn-outline-primary add-to-order" data-id="{{ $item->id }}">
                                                <i class="fa fa-plus"></i> Add to Order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
