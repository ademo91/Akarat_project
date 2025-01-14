<x-guest-layout>
        <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('assets/logo.png') }}" alt="Akarat-login" width="100" height="100">
        </x-slot>

        <x-validation-errors class="mb-4" />
        <div class="text-start justify-start mb-4">
                <h1 class="text-start text-gray-400 text-sm font-bold mb-2">START FOR FREE</h1> 
                <h1 class="text-start text-white text-4xl font-bold">Create new account</h1> 
                <a class="text-sm text-gray-400 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    Already A Member? <span class='text-blue-600 font-bold'>{{ __('Log in') }}</span> 
                </a>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex space-x-4">
            <div class="w-1/2">
                <x-label for="name" value="{{ __('Name') }}"/>
                <x-input id="name" class="block mt-1 w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="w-1/2">
                <x-label for="cin" value="{{ __('CIN') }}"/>
                <x-input id="cin" class="block mt-1 w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full" type="text" name="cin" :value="old('cin')" required autofocus autocomplete="cin" />
            </div>
            </div>  
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4 py-3">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
