@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <div class="row">
            <div class="col-md-8">
                <h2>Cart Items</h2>
                <!-- Display cart items -->
                @if(count($cartItems) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['price'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
            <div class="col-md-4">
                <!-- Shipping and Payment Information form -->
                <h2>Shipping & Payment</h2>
                <!-- Your form fields go here -->
                <form action="" method="POST">
                    @csrf
                    <!-- Add fields for shipping and payment information -->
                    <!-- For example: Name, Address, Payment method, etc. -->
                    <!-- Submit button to place the order -->
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>
@endsection
