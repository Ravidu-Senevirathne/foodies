<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-amber-700 playfair mb-2">Verify Email</h1>
        <div class="h-1 w-16 bg-amber-600 mx-auto"></div>
    </div>

    <div class="mb-4 text-sm text-gray-600 bg-amber-50 p-4 rounded-lg border border-amber-100">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg border border-green-100">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf

            <div>
                <x-primary-button class="w-full sm:w-auto bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
            @csrf

            <button type="submit" class="w-full sm:w-auto px-5 py-2.5 border border-amber-200 text-amber-700 hover:bg-amber-50 rounded-lg transition duration-200">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
    
    <div class="flex justify-center items-center mt-8 text-center">
        <span class="bg-amber-100 px-3 py-1 rounded-full text-xs text-amber-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Check your inbox for the verification link
        </span>
    </div>
</x-guest-layout>
