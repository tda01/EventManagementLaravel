<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Proiect Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fonts.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg custom-navbar p-3">
    <div class="container-fluid">
        <a class="navbar-brand fs-4" href="{{ route('events.index') }}">Control Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item fs-5">
                    <a class="nav-link active" aria-current="page" href="{{ route('events.index') }}">Events</a>
                </li>
                <li class="nav-item fs-5">
                    <a class="nav-link active" aria-current="page" href="{{ route('tickets.index') }}">Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ route('speakers.index') }}">Speakers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ route('partners.index') }}">Partners</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form>
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<script src="{{ asset('/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
