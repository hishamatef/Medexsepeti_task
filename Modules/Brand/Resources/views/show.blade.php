@extends('layouts.app')

@section('content')
    <div class="pt-md-6">
        <div class="container-fluid">
            <div class="">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">{{__('brand::brand.brands')}}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('brands.index') }}">
                                        {{__('brand::brand.brands')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('brand::brand.show_brand')}}</li>
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
                                <h3 class="mb-0">{{__('brand::brand.show_brand')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body col-12">
                        <div class="row row-sm">
                            <div class="col-lg-4">
                                <div class="d-flex justify-content-between mg-b-20">
                                    <div>
                                        <h5 class="main-profile-name">{{$brand->name}}</h5>
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
