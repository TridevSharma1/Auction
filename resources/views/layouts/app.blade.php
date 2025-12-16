<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Auction Website')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        footer {
            background: #212529;
            color: #adb5bd;
        }
        footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        footer a:hover {
            color: #ffffff;
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ================= NAVBAR ================= --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('products.index') }}">AuctionHub</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.create') }}">Create Auction</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">All Auctions</a>
                </li>

                {{-- Auth Links --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="#">
                                    @csrf
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>

{{-- ================= MAIN CONTENT ================= --}}
<main class="py-4">
    @yield('content')
</main>

{{-- ================= FOOTER ================= --}}
<footer class="py-4 mt-auto">
    <div class="container text-center">
        <p class="mb-1">&copy; {{ date('Y') }} AuctionHub</p>
        <small>
            <a href="#">About</a> ·
            <a href="#">Contact</a> ·
            <a href="#">Terms</a>
        </small>
    </div>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
