@extends('admin.admin_dashboard')
@section('title','Admin | Products')

@section('content')
    <div class="products_data">
        <div class="container">
            <h1 class="my-4 text-center">All Products</h1>
            <table class="table table-hover table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>User</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                @if($products->isEmpty())
                    <p class="alert alert-danger mt-2"> No products found.</p>
                @else
                    @foreach ($products as $product)
                        {{--{{ dd($product) }}--}}
                        <tr>
                            <td>
                                @if($product->images->isNotEmpty())
                                    <img src="{{ asset('images/'.$product->images->first()->name) }}" alt="Product Image">
                                @else
                                    <p>No image available</p>
                                @endif
                            </td>
                            <td>{{ $product->id }}</td>
                            <td>{{  $product->user->username }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->info }}</td>
                            <td>{{ $product -> price  . '$' }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center .control-buttons ">
                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-sm editbtn">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form d-inline" style="
        width: 0px !important;
           margin: 1px;
    ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm trash" onclick="confirmDelete(this.form)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
@endsection
