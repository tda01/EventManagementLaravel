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
                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="{{ route('speakers.index') }}">Speakers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="{{ route('partners.index') }}">Partners</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item fs-5">
                    <a class="nav-link active" aria-current="page" href="{{ route('tickets.index') }}">Tickets</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <div class="dropdown ms-auto me-5">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Cart <span class="badge bg-dark">
            <?php
            $cartItems = session()->get('cart', []);
            $totalQuantity = 0;
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalQuantity += $item['quantity'];
                $totalPrice += $item['quantity'] * $item['price']; // Calculate total price for each item
            }

            echo $totalQuantity;
            ?>
        </span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="cartDropdown">
                        <?php foreach ($cartItems as $itemId => $item): ?>
                        <li>
                            <div class="dropdown-item">
                                <strong>Event:</strong> <?php echo $item['event']; ?><br>
                                <strong>Description:</strong> <?php echo $item['description']; ?><br>
                                <strong>Price:</strong> <?php echo $item['price']." RON"; ?><br>
                                <strong>Quantity:</strong> <?php echo $item['quantity']; ?><br>
                                <strong>Total Price:</strong> <?php echo $item['quantity'] * $item['price']." RON"; ?><br>
                                <div class="input-group mb-3">
                                    <form action="{{ route('cart.addToCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-start">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{ $itemId }}">
                                        <button type="submit" class="btn btn-outline-primary me-2">Add 1</button>
                                    </form>
                                    <form action="{{ route('cart.updateCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-end">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $itemId }}">
                                        <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1}}">
                                        <button type="submit" class="btn btn-outline-danger">Remove 1</button>
                                    </form>
                                </div>

                                <form action="{{ route('cart.removeFromCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-end">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $itemId }}">
                                    <button type="submit" class="btn btn-danger w-100">Remove</button>
                                </form>

                            </div>
                        </li>

                        <?php endforeach; ?>
                        <?php if (empty($cartItems)): ?>
                        <li class="dropdown-item">Cart is empty</li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('cart.view') }}">
                                <span class="btn btn-dark w-100">Check Cart</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="d-flex align-items-center">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
