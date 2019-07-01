<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{ config('app.name') }}</title>

  {{-- Scripts --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
  
  {{-- Fonts --}}
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
  {{-- Styles --}}
  <link rel="stylesheet" href="{{ mix('css/tailwind.css') }}">
</head>
<body class="antialiased text-gray-700">
  <div id="app">

    {{-- Navbar --}}
    @include('layouts.partials._navbar')

    {{-- Main --}}
    <main class="container__main container">
      @yield('content')
    </main>
    
  </div>
</body>
</html>
