<?php

namespace Modules\Brand\Http\Services;

use App\Http\Interfaces\CrudInterface;
use Modules\Brand\Entities\Brand;

class BrandService implements  CrudInterface
{
    private $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $brands = $this->model->all();
        return $brands;
    }

    public function store(array $data)
    {
        $brand = $this->model->create($data);
        return $brand ;
    }

    public function update(array $data, $brand)
    {
        $brand->update($data);
        return $brand;
    }
    public function getPaginate($pagination)
    {
        return $this->model->paginate($pagination);
    }

}
