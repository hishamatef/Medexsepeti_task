<?php

namespace Modules\Category\Http\Services;

use App\Http\Interfaces\CrudInterface;
use Modules\Category\Entities\Category;

class CategoryService implements  CrudInterface
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $categories = $this->model->all();
        return $categories;
    }

    public function store(array $data)
    {
        $category = $this->model->create($data);
        return $category ;
    }

    public function update(array $data, $category)
    {
        $category->update($data);
        return $category;
    }
    public function getPaginate($pagination)
    {
        return $this->model->paginate($pagination);
    }
}
