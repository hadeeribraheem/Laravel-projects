@extends('layout')
@section('title', 'Create product')

@section('content')
    <div class="create-product">
        <h2 class="text-center mt-5">Create product</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-3 mb-2">
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

                <!-- Simulation inside a card -->
                <div class="col-lg-6 mt-5 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4> Product Preview</h4>
                            <div class="simulation d-flex">
                                <!-- Images Section -->
                                <div class="images me-4">
                                    <!-- Main Image -->
                                    <div class="main-image mb-3">
                                        <img id="mainImage" src="" alt="Main Product Image" style="display:none; width:100%; height:300px; object-fit: contain;">
                                    </div>

                                    <!-- Thumbnails -->
                                    <div class="thumbnail-gallery d-flex" style="gap:10px; justify-content:center;">
                                        <!-- Thumbnails will be dynamically added here -->
                                    </div>
                                </div>

                                <!-- Product Info Section -->
                                <div class="info mt-2">
                                    <p>
                                        <strong>Name</strong>
                                        <span related_to="name"></span>
                                    </p>
                                    <p>
                                        <strong>Description</strong>
                                        <span related_to="info"></span>
                                    </p>
                                    <p>
                                        <strong>Price</strong>
                                        <span related_to="price"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
