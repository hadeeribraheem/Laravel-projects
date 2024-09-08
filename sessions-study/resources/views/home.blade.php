@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="homepage container mt-5">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <!-- Display product image -->
                        @if($product->images->isNotEmpty())
                            <img src="{{ asset('images/' . $product->images->first()->name) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: contain;">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Default Image" style="height: 200px; object-fit: contain;">
                        @endif

                        <div class="card-body">
                            <!-- Display product name -->
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <!-- Display product price -->
                            <h5 class="card-text">{{ $product->price }} $</h5>

                            <!-- Display stock status -->
                            @if($product->quantity > 0)
                                <p class="text-success">In stock</p>
                            @else
                                <p class="text-danger">Out of stock</p>
                            @endif
                        </div>

                        <div>
                            <!-- Add to Cart button -->
                            @if(auth()->id() != $product->user_id)
                                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                    @csrf
                                    <button class="btn btn-success" type="submit"
                                            @if($product->quantity == 0) disabled @endif>
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <p class="text-muted text-center">You own this product</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
