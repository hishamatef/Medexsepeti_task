<?php


namespace Modules\Product\Http\Controllers;

use App\Enums\MediaCollection;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\CrudInterface;
use Modules\Brand\Entities\Brand;
use Modules\Brand\Http\Resources\BrandResource;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Http\Resources\ProductResource;
use Throwable;

class ProductController extends Controller
{
    protected $product;

    public function __construct(CrudInterface $product)
    {
        $this->product = $product;
        $this->authorizeResource(Product::class, 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();
        $products = ProductResource::collection($products);
        $products = json_decode (json_encode ($products->toArray($products),FALSE));
        return view('product::index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $categories = CategoryResource::collection($categories);
        $brands = BrandResource::collection($brands);
        $brands = json_decode (json_encode ($brands->toArray($brands),FALSE));
        $categories = json_decode (json_encode ($categories->toArray($categories),FALSE));
        return view('product::create', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $this->product->store($request->validated());
            toastr()->success(__('public.success_create'));
            return redirect()->route('products.index');
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**12
     * Display the specified resource.
     *
     * @param \Modules\Product\Entities\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product_resource = new ProductResource($product);
        $product = json_decode (json_encode ($product_resource->toArray($product),FALSE));
        return view('product::show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Product\Entities\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $categories = new CategoryResource($categories);
        $brands = new BrandResource($brands);
        return view('product::edit', compact('product', 'categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Modules\Product\Entities\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $this->product->update($request->validated(), $product);
            toastr()->success(__('public.success_update'));
            return redirect()->route('products.index');
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Product\Entities\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return successResponse(__('public.success_delete'));
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return errorResponse(__('public.error_delete'));
        }
    }
}
