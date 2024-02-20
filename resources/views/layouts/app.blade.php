<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        @googlefonts
        <link rel="icon" type="image/png" href="{{ asset('storage/icons/favicon.png') }}">
    

        <!-- Scripts -->
        
        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])         
        @livewireStyles
        @livewireScripts
        @stack('scripts')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
      
            @include('layouts.navigation')
           

          
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        

        @livewire('notifications')


    </body>
</html>
