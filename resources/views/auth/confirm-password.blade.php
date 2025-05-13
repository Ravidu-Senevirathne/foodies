<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-amber-700 playfair mb-2">Confirm Password</h1>
        <div class="h-1 w-16 bg-amber-600 mx-auto"></div>
    </div>

    <div class="mb-5 text-sm text-gray-600 bg-amber-50 p-4 rounded-lg border border-amber-100">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input id="password" class="block mt-1 w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-300 focus:ring-opacity-50 transition duration-200"
                             type="password"
                             name="password"
                             required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-6">
            <x-primary-button class="bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
