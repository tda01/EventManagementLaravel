@extends('layouts.master')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container mt-5">
        <div class="card border-0">
            <div class="card-header custom-card-header fs-4">
                Cart Items
            </div>

            <div class="card-body custom-card-body">
                @if(count($cartItems) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Event</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $itemId => $item)
                            <tr>
                                <td class="align-middle" >{{ $item['event'] }}</td>
                                <td class="align-middle" >{{ $item['description'] }}</td>
                                <td class="align-middle" >{{ $item['price'] }} RON</td>
                                <td class="align-middle" >{{ $item['quantity'] }}</td>
                                <td class="align-middle" >{{ $item['price'] * $item['quantity'] }} RON</td>
                                <td class="align-middle" >
                                    <div class="d-flex justify-content-center gap-1">
                                    <form action="{{ route('cart.addToCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-start">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{ $itemId }}">
                                        <button type="submit" class="btn btn-primary">Add 1</button>
                                    </form>
                                    <form action="{{ route('cart.updateCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-end">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $itemId }}">
                                        <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1}}">
                                        <button type="submit" class="btn btn-warning">Remove 1</button>
                                    </form>
                                        <form action="{{ route('cart.updateCart', ['id' => $itemId]) }}" method="POST" class="d-flex">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $itemId }}">
                                            <div class="input-group">
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm">
                                                <button type="submit" class="btn btn-primary">Set Quantity</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('cart.removeFromCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-end">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $itemId }}">
                                            <button type="submit" class="btn btn-danger w-100">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                @php
                    $totalPrice = 0;
                    foreach ($cartItems as $item) {
                        $totalPrice += $item['price'] * $item['quantity'];
                    }
                @endphp
                <div class="total-price ml-auto">
                    <strong>Total Price:</strong> {{ $totalPrice }} RON
                </div>

                <form action="{{ route('session') }}" method="POST">
                    @csrf
                    @foreach($cartItems as $itemId => $item)
                        <!-- Pass the necessary item details for Stripe checkout -->

                        <input type="hidden" name="items[{{ $itemId }}][productname]" value="{{ $item['event'] }} - {{ $item['description'] }}">
                        <input type="hidden" name="items[{{ $itemId }}][price]" value="{{ $item['price'] }}">
                        <input type="hidden" name="items[{{ $itemId }}][quantity]" value="{{ $item['quantity'] }}">
                    @endforeach
                    <button type="submit" class="btn btn-success">Checkout</button>
                </form>

            </div>
        </div>
    </div>
@endsection
