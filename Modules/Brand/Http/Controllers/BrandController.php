<?php


namespace Modules\Brand\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\CrudInterface;
use Illuminate\Support\Facades\Response;
use Modules\Brand\Entities\Brand;
use Modules\Brand\Http\Requests\BrandRequest;
use Modules\Brand\Http\Resources\BrandResource;
use Modules\Product\Entities\Product;
use Throwable;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(CrudInterface $brand)
    {
        $this->brand = $brand;
        $this->authorizeResource(Brand::class, 'brand');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brand->all();
        $brands = BrandResource::collection($brands);
        $brands = json_decode (json_encode ($brands->toArray($brands),FALSE));
        return view('brand::index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        try {
            $this->brand->store($request->validated());
            toastr()->success(__('public.success_create'));
            return redirect()->route('brands.index');
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Modules\Brand\Entities\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $brand = new BrandResource($brand);
        $brand = json_decode (json_encode ($brand->toArray($brand),FALSE));
        return view('brand::show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Brand\Entities\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brand::edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Modules\Brand\Entities\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        try {
            $this->brand->update($request->validated(), $brand);
            toastr()->success(__('public.success_update'));
            return redirect()->route('brands.index');
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Brand\Entities\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try {
            if (Product::where('brand_id', $brand->id)->count() > 0) {
                return errorResponse(__('public.error_delete'));
            }
            $brand->delete();
            return successResponse(__('public.success_delete'));
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return errorResponse(__('public.error_delete'));
        }
    }
}
