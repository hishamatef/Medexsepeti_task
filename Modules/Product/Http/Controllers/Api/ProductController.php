<?php

namespace Modules\Product\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Interfaces\CrudInterface;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Http\Resources\ProductResource;
use Throwable;

class ProductController extends ApiController
{
    protected $product;

    public function __construct(CrudInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $products = Product::all();
        return $this->ok('',ProductResource::collection($products)->resolve());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try{
            $product = $this->product->store($request->validated());
            return $this->ok(__('public.success_create'),[new ProductResource($product)] );
        }catch(Throwable $e){
            return $this->invalid([$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->ok('',[new ProductResource($product)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Product\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try{
            $product_update = $this->product->update($request->validated(), $product);
            return $this->ok('',[new ProductResource($product_update)], null, __('public.success_update'));
        }catch(Throwable $e){
            return $this->invalid([$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try{
            $product->delete();
            return $this->ok(__('public.success_delete'));
        }catch(Throwable $e){
            return $this->invalid([$e->getMessage()]);
        }
    }
}
