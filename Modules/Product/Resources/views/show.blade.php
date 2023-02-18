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
                                <li class="breadcrumb-item active" aria-current="page">{{__('product::product.show_product')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="">
                        <div class="pl-0">
                            <div class="main-profile-overview">
                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home">

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('public.name')}} : {{$product->name}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('category::category.category')}} : {{$product->category->name}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('brand::brand.brand')}} : {{$product->brand->name}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.barcode')}} : {{$product->barcode}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.short_description')}} : {{$product->short_description}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.long_description')}} : {{$product->long_description}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.price')}} : {{$product->price}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.price_after_discount')}} : {{$product->price_after_discount}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.quantity')}} : {{$product->quantity}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.discount')}} : {{$product->discount}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.discount_type')}} : {{$product->discount_type}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.discount_start_at')}} : {{$product->discount_start_at}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.discount_end_at')}} : {{$product->discount_end_at}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.status')}} : {{$product->status}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home"><p class="m-b-5">{{__('product::product.views')}} : {{$product->views}}</p>
                                    </div>
                                </div>

                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                                    <div class="tab-pane active" id="home">
                                        <p class="m-b-5">{{__('product::product.product_image')}} : </p>
                                        <img src="{{$product->product_image}}" />
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
