<?php

namespace App\Http\Controllers;

use App\Events\SaveProductEvent;
use App\Http\Requests\ProductFormRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use App\Services\DeleteEntityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all products
        $data = Products::with(['user', 'images']) // Eager load 'user' and 'image' relationships
            ->orderBy('id', 'DESC')
            ->paginate(2);

        $products = ProductsResource::collection($data);
        //dd($products);
        return view('admin.view_products', compact('products'));
       //return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.save');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        DB::beginTransaction();
        event(new SaveProductEvent(
            request()->except(keys: 'images'),
            request()->file(key: 'images')
        ));
        DB::commit();

        return redirect()->back()->with('message', 'Product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the product by its ID and load related 'user' and 'images' relationships
        $product = Products::with(['user', 'images'])->findOrFail($id);

        // Return the product data to the view
        return view('admin.update_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = DeleteEntityService::delete('Products', $id);

        if ($result) {
            return redirect()->back()->with('success', 'User deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'User not found or could not be deleted.');
        }
    }
}
