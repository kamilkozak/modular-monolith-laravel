<?php

declare(strict_types=1);

namespace Module\Inventory\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Module\Inventory\Application\Http\Requests\StoreProductRequest;
use Module\Inventory\Application\Http\Requests\UpdateProductRequest;
use Module\Inventory\Application\Http\Resources\Product as ProductResource;
use Module\Inventory\Domain\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Module\Inventory\Application\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Module\Inventory\Domain\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Module\Inventory\Application\Http\Requests\UpdateProductRequest  $request
     * @param  \Module\Inventory\Domain\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Module\Inventory\Domain\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
