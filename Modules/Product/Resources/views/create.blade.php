@extends('layouts.app')

@section('content')
    <div class="pt-md-6">
        <div class="container-fluid">
            <div class="">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">{{__('product::product.products')}}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('products.index') }}">
                                        {{__('product::product.products')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('product::product.add_product')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{__('product::product.add_product')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body col-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{Route('products.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <label for="inputName" class="control-label">{{__('public.name')}}</label>
                                                    <input type="text" class="form-control" id="inputName" name="name" required>
                                                </div>
                                                <div class="col">
                                                    <label for="category_id" class="control-label">{{__('category::category.categories')}}</label>
                                                    <select class="form-control select2" name="category_id" id="category_id" required>
                                                        <option label="{{__('public.choose')}}"></option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="brand_id" class="control-label">{{__('brand::brand.brands')}}</label>
                                                    <select class="form-control select2" name="brand_id" id="brand_id" required>
                                                        <option label="{{__('public.choose')}}"></option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="short_description" class="control-label">{{__('product::product.short_description')}}</label>
                                                    <input type="text" class="form-control" id="short_description" name="short_description">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="long_description" class="control-label">{{__('product::product.long_description')}}</label>
                                                    <input type="text" class="form-control" id="long_description" name="long_description">
                                                </div>
                                                <div class="col">
                                                    <label for="price" class="control-label">{{__('product::product.price')}}</label>
                                                    <input type="number" class="form-control" id="price" name="price" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="quantity" class="control-label">{{__('product::product.quantity')}}</label>
                                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                                </div>
                                                <div class="col">
                                                    <label for="views" class="control-label">{{__('product::product.views')}}</label>
                                                    <input type="number" class="form-control" id="views" name="views" required>
                                                </div>
                                                <div class="col">
                                                    <label for="discount" class="control-label">{{__('product::product.discount')}}</label>
                                                    <input type="number" class="form-control" id="discount" name="discount">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="discount_type" class="control-label">{{__('product::product.discount_type')}}</label>
                                                    <select class="form-control select2" name="discount_type" id="discount_type">
                                                        <option label="{{__('public.choose')}}"></option>
                                                        <option value="{{\App\Enums\Discounts::FIXED}}">{{__('product::product.fixed')}}</option>
                                                        <option value="{{\App\Enums\Discounts::PERCENT}}">{{__('product::product.percent')}}</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="discount_start_at" class="form-control-label">{{__('product::product.discount_start_at')}}</label>
                                                    <input class="form-control" type="date" id="discount_start_at" id="discount_start_at" name="discount_start_at">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="discount_end_at" class="form-control-label">{{__('product::product.discount_end_at')}}</label>
                                                    <input class="form-control" type="date" id="discount_start_at" id="discount_end_at" name="discount_end_at">
                                                </div>
                                                <div class="col">
                                                    <label for="status" class="control-label">{{__('product::product.status')}}</label>
                                                    <select class="form-control select2" name="status" id="status">
                                                        <option label="{{__('public.choose')}}"></option>
                                                        <option value="{{\App\Enums\Status::ACTIVE}}">{{__('product::product.active')}}</option>
                                                        <option value="{{\App\Enums\Status::INACTIVE}}">{{__('product::product.inactive')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary mt-3">{{__('product::product.add_product')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
