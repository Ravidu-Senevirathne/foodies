<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-amber-700 playfair mb-2">Forgot Password</h1>
        <div class="h-1 w-16 bg-amber-600 mx-auto"></div>
    </div>

    <div class="mb-5 text-sm text-gray-600 bg-amber-50 p-4 rounded-lg border border-amber-100">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <x-text-input id="email" class="block mt-1 w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-300 focus:ring-opacity-50 transition duration-200" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-amber-600 hover:underline">
                {{ __('Back to login') }}
            </a>
            <x-primary-button class="bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
