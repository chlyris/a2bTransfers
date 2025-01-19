<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" aria-describedby="responsive-note">
    <title>Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300..700&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    @vite(['resources/css/app.css'])
</head>
<body class="bg-dark text-white">
    <div class="container py-5 d-flex flex-column justify-content-center vh-100" role="main" aria-labelledby="main-heading">
        <div class="d-flex flex-column justify-content-center border rounded-5 border-white mx-auto p-5">

            <header class="mb-4 text-center" role="banner">
                <img src="https://a2bservices.gr/wp-content/uploads/2023/12/a2b-Logo-Blue-cropped.png" class="image-fluid align-self-center mb-3" style="max-width: 200px;">
                <p class="h2">Welcome to a2b Transfers!</p>
				<p class="h4">Round-the-clock luxury transport at your fingertips.</p>
            </header>

            <main class="text-center">
                <p><a href="https://a2bservices.gr" target="_blank" class="text-light text-decoration-none"><i class="fa-solid fa-globe me-2"></i> https://a2bservices.gr</a></p>
                <p><a href="tel://+306944471444" class="text-light text-decoration-none"><i class="fa-solid fa-phone me-2"></i> +30 694 447 1444</a></p>
                <p><a href="mailto://booking@a2bservices.gr" class="text-light text-decoration-none"><i class="fa-solid fa-envelope me-2"></i> booking@a2bservices.gr</a></p>
                <p><a href="https://maps.app.goo.gl/572Vv5vtH212u3v29" target="_blank" class="text-light text-decoration-none"><i class="fa-solid fa-location-dot me-2"></i> Akti Themistokleous 294, Pireas 185 39</a></p>
                <p><a href="https://www.instagram.com/a2bservices.gr?igsh=MWl3amd1dGlzdXFqcQ%3D%3D" target="_blank" class="text-light text-decoration-none"><i class="fa-brands fa-instagram me-2"></i> a2bservices.gr</a></p>
                <div class="d-flex justify-content-center align-items-center gap-5">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn fs-4 mb-3 login-button">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <a class="btn fs-4 mb-3 login-button" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                    </a>
                                </form>
                        @else
                            <a href="{{ route('login') }}" class="btn fs-4 login-button">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn fs-4 login-button">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
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
