<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Proiect Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fonts.css') }}" rel="stylesheet">



</head>
<body>
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('events.index')}}">{{$event->title}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./agenda">Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./speakers">Speakers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./partners">Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('tickets.index')}}">Tickets</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
