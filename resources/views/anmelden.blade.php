<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('storage/icons/favicon.png') }}">


        <title>{{ config('app.name') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])         
        @livewireStyles
        @livewireScripts
        @stack('scripts')
      

    </head>

    <body class="antialiased bg-white"> 
   
        @include('layouts/navigation')
    
  
        <livewire:login-form>

    
    @yield('content')

    @livewire('notifications')

    @include('layouts/footer')
</body>
</html>