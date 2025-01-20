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
    <div class="container py-5 d-flex flex-column justify-content-center min-vh-100" role="main" aria-labelledby="main-heading">
        <div class="d-flex flex-column justify-content-center border rounded-5 border-white mx-auto p-5">

            <header class="mb-4 text-center" role="banner">
                <img src="https://a2bservices.gr/wp-content/uploads/2023/12/a2b-Logo-Blue-cropped.png" class="image-fluid align-self-center mb-3" style="max-width: 200px;">
                <p class="h2">Welcome to a2b Transfers!</p>
				<p class="h4">Round-the-clock luxury transport at your fingertips.</p>
            </header>

            <main>
                {{ $slot }}
            </main>

            <footer class="text-center mt-5" role="contentinfo">
                <p>&copy; {{ date('Y') }} a2bServices. All Rights Reserved.</p>
            </footer>

        </div>
    </div>

    <!-- Bootstrap JS -->
    @vite(['resources/js/app.js'])
</body>
</html>