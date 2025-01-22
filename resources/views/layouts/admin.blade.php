<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" aria-describedby="responsive-note">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300..700&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    @vite(['resources/css/app.css'])
</head>
<body class="bg-dark text-white">
  @include('layouts.navbar')

  <div class="container-fluid">

    <header class="my-4 d-flex justify-content-between" role="banner">
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="text-center mt-5" role="contentinfo">
        <p>&copy; {{ date('Y') }} a2bServices. All Rights Reserved.</p>
    </footer>

  </div>
    <!-- Bootstrap JS -->
    @vite(['resources/js/app.js'])
</body>
</html>