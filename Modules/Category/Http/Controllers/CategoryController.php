<?php


namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\CrudInterface;
use Illuminate\Support\Facades\Response;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Product\Entities\Product;
use Throwable;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CrudInterface $category)
    {
        $this->category = $category;
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();
        $categories = CategoryResource::collection($categories);
        $categories = json_decode (json_encode ($categories->toArray($categories),FALSE));
        return view('category::index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $this->category->store($request->validated());
            toastr()->success(__('public.success_create'));
            return redirect()->route('categories.index');
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Modules\Category\Entities\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = new CategoryResource($category);
        $category = json_decode (json_encode ($category->toArray($category),FALSE));
        return view('category::show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Category\Entities\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Modules\Category\Entities\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $this->category->update($request->validated(), $category);
            toastr()->success(__('public.success_update'));
            return redirect()->route('categories.index');
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Category\Entities\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            if (Product::where('category_id', $category->id)->count() > 0) {
                return errorResponse(__('public.error_delete'));
            }
            $category->delete();
            return successResponse(__('public.success_delete'));
        } catch (Throwable $e) {
            $this->saveLog($e->getMessage());
            return errorResponse(__('public.error_delete'));
        }
    }
}
