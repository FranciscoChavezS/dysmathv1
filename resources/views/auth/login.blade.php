<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <a href="#" class="flex items-center justify-center mt-4 text-gray-600 border rounded-lg dark:bg-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
        <div class="px-4 py-2">
            <img src="https://img.icons8.com/color/28/000000/google-logo.png"/>
        </div>

            <span class="w-5/6 px-4 py-3 font-bold text-center">
                Inicia sesión con Google
            </span>
        </a>

        <a href="/auth/facebook/redirect" class="flex items-center justify-center mt-4 text-gray-600 border rounded-lg dark:bg-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
            <div class="px-4 py-2">
                <img src="https://img.icons8.com/external-tal-revivo-color-tal-revivo/24/000000/external-famous-social-media-online-social-media-and-social-networking-service-facebook-logo-color-tal-revivo.png"/>
            </div>
    
                <span class="w-5/6 px-4 py-3 font-bold text-center">
                    Inicia sesión con Facebook
                </span>
        </a>

        <div class="flex items-center justify-between mt-4">
            <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>
            <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">O inicia sesión con tu email</a>
            <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>

        </div>

        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
