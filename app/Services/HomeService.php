<?php
namespace App\Services;

use App\Enums\PaginationCount;
use Illuminate\Support\Facades\Auth;
use Modules\Brand\Http\Resources\BrandResource;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Product\Http\Resources\ProductResource;
use Modules\Product\Http\Services\ProductService;
use Modules\Category\Http\Services\CategoryService;
use Modules\Brand\Http\Services\BrandService;

class HomeService
{
    protected $product;
    protected $category;
    protected $brand;

    public function __construct(ProductService $product,CategoryService $category,BrandService $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
    }

    /**
     * Get Home data list.
     *
     * @return array
     */
    public function getHomeData()
    {
        $data['categories'] = $this->prepareData(CategoryResource::class,$this->category->getPaginate(PaginationCount::CATEGORIES));
        $data['brands'] = $this->prepareData(BrandResource::class,$this->brand->getPaginate(PaginationCount::BRANDS));
        $data['specialOffers'] = $this->prepareData(ProductResource::class,$this->product->getSpecialOfferProducts(PaginationCount::OFFER_PRODUCTS));
        $data['mostViewedProducts'] = $this->prepareData(ProductResource::class,$this->product->getMostViewedProducts(PaginationCount::PRODUCTS));
        $data['lastVisitedProducts'] = $this->prepareData(ProductResource::class,$this->product->getUserLastVisitedProducts(PaginationCount::PRODUCTS));
        return $data;
    }
    private function prepareData($resource,$date){
        $data= $resource::collection($date);
        return json_decode (json_encode ($data->toArray($data),FALSE));
    }

}
