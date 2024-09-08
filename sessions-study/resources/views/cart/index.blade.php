@extends('layout')
@section('title', 'Shopping Cart')
@section('content')
    <div class="container mt-5">
        <h2>Your Cart</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $id => $item)
                <tr>
                    <td><img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px;"></td>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            <select name="quantity" class="form-select" id="quantity">
                                @for($i = 1; $i <= ($item['stock'] ?? 1); $i++)
                                    <option value="{{ $i }}" {{ $i == $item['quantity'] ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </td>

                    <td>{{ $item['price'] }} $</td>
                    <td>{{ $item['price'] * $item['quantity'] }} $</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Purchase</button>
        </form>
    </div>
@endsection
