@extends('admin.admin_dashboard')
@section('title', 'Order details')

@section('content')
    <div class="orders mt-5">
        <div class="container">
            <h2>Order Details - Order ID: {{ $order->id }}</h2>
            <p>Customer: {{ $order->user->username }}</p>
            <p>Total Price: {{ $order->total_price }} $</p>
            <p>Status: {{ $order->status }}</p>

            <h4>Items</h4>
            <table class="table">
                <thead>
                <tr class="text-center">
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }} $</td>
                        <td>{{ $item->price * $item->quantity }} $</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <a href="{{ route('dashboard.orders') }}" class="btn btn-primary">Back to Orders</a>
        </div>
    </div>
@endsection
