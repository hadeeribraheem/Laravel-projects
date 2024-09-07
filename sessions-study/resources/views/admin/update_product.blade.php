@extends('admin.admin_dashboard')
@section('title', 'Edit Product')
@section('content')
    <div class="products_data">
        <div class="container">
            <h2 class="text-center">Update Product</h2>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif

            @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
            @endif
            <form method="post" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Product Name</label>
                    <input class="form-control" name="name" value="{{ $product->name }}">
                </div>

                <div class="mb-3">
                    <label>Product Description</label>
                    <textarea class="form-control" name="info">{{ $product->info }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Price</label>
                    <input class="form-control" name="price" value="{{ $product->price }} ">
                </div>

                <div class="mb-3">
                    <label>Product Images (leave blank if you don't want to change)</label>
                    <input class="form-control" type="file" name="images[]"  accept="images/*" multiple >

                    @if($product->images->isNotEmpty())
                        <div class="mt-3">
                            <label>Current Images:</label>
                            <div class="row d-flex">
                                @foreach($product->images as $image)
                                        <div class=" col-md-3 d-flex position-relative delete-image justify-content-center  ">
                                            <a href="/delete-item?model_name=Images&id={{ $image->id }}"><i class="ri-close-line"></i></a>
                                            <img src="{{ asset('images/'.$image->name) }}" alt="Product Image" class="img-fluid align-items-center " style="max-width: 100%;max-height: 149px ;margin-right: 10px;">
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p>No images available.</p>
                    @endif
                </div>

                <input type="submit" class="btn btn-success" value="Update Product">
            </form>
        </div>
    </div>
@endsection
