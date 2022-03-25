<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="DnywlK_z62hvcpIaYfFNI80jh0t-FWCtsJxiThEK9Vs" />

        <title>{{ config('app.name', 'DYSMATH') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased dark:bg-gray-800">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-800">
            @livewire('navigation-menu')



            <!-- Page Content -->
            <main class="dark:bg-gray-800">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        
        @isset($js)
            
       
            {{$js}}

        @endisset

        

    </body>
</html>
