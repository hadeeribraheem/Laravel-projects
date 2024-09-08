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
    public function __construct(){
        $this->middleware('checklogin')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            if (auth()->user()->type === 'admin') {
                $data = Products::with(['user', 'images'])
                    ->orderBy('id', 'DESC')
                    ->paginate(2);

                $products = ProductsResource::collection($data);

                return view('admin.view_products', compact('products'));
            }
        }

        $data = Products::with(['user', 'images'])
                            ->orderBy('id', 'DESC')
                            ->paginate(10);

        $products = ProductsResource::collection($data);

        // Redirect to the home page with the products data for non-admins
        return view('home', compact('products'));



        /*// Fetch all products
        $data = Products::with(['user', 'images']) // Eager load 'user' and 'image' relationships
            ->orderBy('id', 'DESC')
            ->paginate(2);

        $products = ProductsResource::collection($data);
        //dd($products);
        return view('admin.view_products', compact('products'));*/
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
            $request->except(keys: 'images'),
            $request->file(key: 'images')
        ));
        DB::commit();

        return redirect()->back()->with('message', 'Product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd('hello');
        // Find the product by its ID and load related 'user' and 'images' relationships
        $product = Products::with(['user', 'images'])->findOrFail($id);
        //|| $product->user_id != auth()->id() || auth()->user()->type != 'admin'
        if ($product === null ) {
            return redirect()->to('/products');
        }
        // Return the product data to the view
        return view('admin.update_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, string $id)
    {
        //dd($request ->all());
        // Start a database transaction
        DB::beginTransaction();

        // Fetch the product with its associated images
        $product = Products::query()->with(['images'])->find($id);

        // If no new images are uploaded and there are no existing images, return an error
        if (sizeof($product->images) == 0 && $request->hasFile('images') == false) {
            return redirect()->back()->withErrors(['error' => 'You should upload at least one image']);
        }

        // Prepare the basic data except for the 'images' key
        $basic_data = $request->except('images');
        $basic_data['id'] = $id;
        $basic_data['user_id'] = $product->user_id;

        // Trigger the SaveProductEvent with the updated product data
        event(new SaveProductEvent(
            $basic_data,
            $request->file('images') ?? [], // If images exist in the request, use them; otherwise, default to an empty array
            false // Set 'create' to false since this is an update
        ));

        // Commit the transaction
        DB::commit();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Product updated successfully');
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
