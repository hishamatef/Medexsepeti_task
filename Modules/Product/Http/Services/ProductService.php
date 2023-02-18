<?php

namespace Modules\Product\Http\Services;

use App\Enums\Discounts;
use App\Enums\MediaCollection;
use App\Enums\Status;
use Modules\Product\Entities\Product;
use App\Http\Interfaces\CrudInterface;
use phpDocumentor\Reflection\Types\Integer;

class ProductService implements CrudInterface
{
    private $model;
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        $products = $this->model->all();
        return $products;
    }
    public function store(array $data)
    {
        $data = $this->prepareData($data);
        $product = $this->model->create($data);
        return $product;
    }

    public function update(array $data, $product)
    {
        $data = $this->prepareData($data);
        $product->update($data);
        return $product;
    }
    private function prepareData($data):array
    {
        $data['barcode'] = !isset($data['barcode'])?unique_random('products', 'barcode'):$data['barcode'];
        $data['price_after_discount'] = $this->preparePriceAfterDiscount($data);
        $data['status'] = !isset($data['status'])?Status::INACTIVE:$data['status'];
        return $data;

    }
    private function preparePriceAfterDiscount($data):float
    {
        if(isset($data['discount'])){
            return $data['price'] - (isset($data['discount_type']) && $data['discount_type'] == Discounts::FIXED? $data['discount']:$data['discount']/100 * $data['price']);
        }
        return  0;

    }
    public function getPaginate($pagination)
    {
        return $this->model->paginate($pagination)->get();
    }
    public function getSpecialOfferProducts($pagination)
    {
        return $this->model->active()->validOffers()->whereNotNull('discount')->paginate($pagination);
    }
    public function getMostViewedProducts($pagination)
    {
        return $this->model->active()->orderBy('views', 'Desc')->paginate($pagination);
    }
    public function getUserLastVisitedProducts($pagination)
    {
        return $this->model->active()->userLastVisited()->orderBy('views', 'Desc')->paginate($pagination);
    }
}
