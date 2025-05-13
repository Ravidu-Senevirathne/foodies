@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-800">{{ __('Menu') }}</h2>
        </div>
        <div class="px-6 py-4">
            {{-- Sample Foods Section --}}
            <div class="mb-8">
                <h3 class="text-lg font-bold mb-4 text-indigo-700">Sample Foods</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="bg-gray-50 rounded-lg shadow flex flex-col">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="Sample Pizza" class="rounded-t-lg w-full h-40 object-cover">
                        <div class="flex-1 flex flex-col p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-md font-semibold text-gray-800">Margherita Pizza</h4>
                                <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-bold px-2 py-1 rounded">$9.99</span>
                            </div>
                            <p class="text-gray-600 text-xs mb-2 flex-1">Classic pizza with tomato sauce, mozzarella, and fresh basil.</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg shadow flex flex-col">
                        <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=400&q=80" alt="Sample Burger" class="rounded-t-lg w-full h-40 object-cover">
                        <div class="flex-1 flex flex-col p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-md font-semibold text-gray-800">Cheeseburger</h4>
                                <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-bold px-2 py-1 rounded">$7.49</span>
                            </div>
                            <p class="text-gray-600 text-xs mb-2 flex-1">Juicy beef patty, cheddar cheese, lettuce, tomato, and pickles.</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg shadow flex flex-col">
                        <img src="https://images.unsplash.com/photo-1464306076886-debca5e8a6b0?auto=format&fit=crop&w=400&q=80" alt="Sample Salad" class="rounded-t-lg w-full h-40 object-cover">
                        <div class="flex-1 flex flex-col p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-md font-semibold text-gray-800">Caesar Salad</h4>
                                <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-bold px-2 py-1 rounded">$5.99</span>
                            </div>
                            <p class="text-gray-600 text-xs mb-2 flex-1">Crisp romaine, parmesan, croutons, and Caesar dressing.</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Sample Foods Section --}}

            {{-- Menu Tabs --}}
            <div>
                <ul class="flex border-b mb-6" id="menuTabs" role="tablist">
                    @foreach($menuItems->keys() as $index => $category)
                    <li class="-mb-px mr-2" role="presentation">
                        <button class="inline-block px-4 py-2 rounded-t-lg border-b-2 {{ $index === 0 ? 'border-indigo-600 text-indigo-600 font-semibold' : 'border-transparent text-gray-500 hover:text-indigo-600 hover:border-indigo-300' }}"
                            id="{{ Str::slug($category) }}-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#{{ Str::slug($category) }}"
                            type="button"
                            role="tab">
                            {{ ucfirst($category) }}
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content" id="menuTabContent">
                @foreach($menuItems->keys() as $index => $category)
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                    id="{{ Str::slug($category) }}"
                    role="tabpanel">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach($menuItems[$category] as $item)
                        <div class="bg-gray-50 rounded-lg shadow hover:shadow-lg transition-shadow duration-200 flex flex-col">
                            @if($item->image)
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="rounded-t-lg w-full h-48 object-cover">
                            @endif
                            <div class="flex-1 flex flex-col p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $item->name }}</h3>
                                    <span class="inline-block bg-indigo-100 text-indigo-700 text-sm font-bold px-3 py-1 rounded">${{ number_format($item->price, 2) }}</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-4 flex-1">{{ $item->description }}</p>
                                <form method="POST" action="{{ route('dashboard.cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="menu_item_id" value="{{ $item->id }}">
                                    <div class="flex items-center gap-2">
                                        <input type="number" name="quantity" value="1" min="1" class="w-16 rounded border-gray-300 text-sm" />
                                        <button type="submit" class="ml-auto inline-flex items-center px-3 py-1.5 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 transition">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Add to Order
                                        </button>
                                    </div>
                                </form>
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
<script>
    // Simple tab switching for Tailwind (Bootstrap JS not required)
    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            // Remove active classes
            document.querySelectorAll('[data-bs-toggle="tab"]').forEach(t => t.classList.remove('border-indigo-600', 'text-indigo-600', 'font-semibold'));
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));
            // Add active to clicked tab
            this.classList.add('border-indigo-600', 'text-indigo-600', 'font-semibold');
            // Show corresponding pane
            const target = this.getAttribute('data-bs-target');
            document.querySelector(target).classList.add('show', 'active');
        });
    });
</script>
@endsection
