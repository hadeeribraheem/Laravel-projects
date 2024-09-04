<!-- save.blade.php -->
@extends('layout')
@section('title', 'Create product')

@section('content')
    <div class="create-product">
        <h2 class="text-center">Create product</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2">
                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label>Name</label>
                            <input class="form-control simulated" id="product-name" name="name" required>
                        </div>
                        <div class="mb-2">
                            <label>Info</label>
                            <textarea class="form-control simulated" id="product-info" name="info" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label>Price</label>
                            <input class="form-control simulated" id="product-price" type="number" name="price" required>
                        </div>
                        <div class="mb-2">
                            <label>Images</label>
                            <input class="form-control" type="file" name="images[]" accept="images/*" multiple required>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-success">Create Product</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="simulation d-flex">
                        <div class="images"></div>
                        <div class="info">
                            <p>
                                <span>Name:</span>
                                <span related_to = "name"></span>
                            </p>
                            <p>
                                <span>Description of product:</span>
                                <span related_to = "info"></span>
                            </p>
                            <p>
                                <span>Price:</span>
                                <span  related_to = "price"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
