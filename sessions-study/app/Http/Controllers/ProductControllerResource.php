<?php

namespace App\Http\Controllers;

use App\Events\SaveProductEvent;
use App\Http\Requests\ProductFormRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('products.index');
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
        //
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
        //
    }
}
