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
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('product::product.products')}}</li>
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
                                <h3 class="mb-0">{{__('product::product.products')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">{{__('product::product.add_product')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body col-12">
                        <table class="table" id="datatable">
                            <thead>
                            <tr>
                                <th class="text-center">{{__('public.id')}}</th>
                                <th class="text-center">{{__('public.name')}}</th>
                                <th class="text-center">{{__('category::category.category')}}</th>
                                <th class="text-center">{{__('brand::brand.brand')}}</th>
                                <th class="text-center">{{__('product::product.barcode')}}</th>
                                <th class="text-center">{{__('product::product.short_description')}}</th>
                                <th class="text-center">{{__('product::product.long_description')}}</th>
                                <th class="text-center">{{__('product::product.price')}}</th>
                                <th class="text-center">{{__('product::product.price_after_discount')}}</th>
                                <th class="text-center">{{__('product::product.quantity')}}</th>
                                <th class="text-center">{{__('product::product.discount')}}</th>
                                <th class="text-center">{{__('product::product.discount_type')}}</th>
                                <th class="text-center">{{__('product::product.discount_start_at')}}</th>
                                <th class="text-center">{{__('product::product.discount_end_at')}}</th>
                                <th class="text-center">{{__('product::product.status')}}</th>
                                <th class="text-center">{{__('product::product.views')}}</th>
                                <th class="text-center">{{__('product::product.product_image')}}</th>
                                <th class="text-center">{{__('public.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $product_count = 1; @endphp
                            @foreach($products as $product)
                                <tr class="item{{$product->id}}">
                                    <td>{{$product_count++}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->barcode}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{$product->long_description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->price_after_discount}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>{{$product->discount_type}}</td>
                                    <td>{{$product->discount_start_at}}</td>
                                    <td>{{$product->discount_end_at}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>{{$product->views}}</td>
                                    <td><img style="width: 100px;" src="{{$product->product_image}}" /></td>
                                    <td class="float-right">
                                        <a href="{{route('products.show',$product->id)}}" class="edit-modal btn btn-info">
                                            <span class="glyphicon glyphicon-eye"></span> {{__('public.show')}}
                                        </a>
                                        <a href="{{route('products.edit',$product->id)}}" class="edit-modal btn btn-info">
                                            <span class="glyphicon glyphicon-edit"></span> {{__('public.edit')}}
                                        </a>
                                        <a data-target="#deletemodal" data-toggle="modal" class="trash text-white delete-modal btn btn-danger" data-attr="{{$product->id}}">
                                            <span class="glyphicon glyphicon-trash"></span> {{__('public.delete')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @include('layouts.footers.auth')
    </div>
    <div class="modal" id="deletemodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h3 class="modal-title">{{__('product::product.delete_product')}}</h3><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h3>{{__('public.delete_sure')}}</h3>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger deleteProduct" type="button">{{__('product::product.delete_product')}}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{__('public.cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@endpush
@push('js')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable.js?v=1.0.0"></script>
    <script>
        $(document).ready(function() {
            $('.trash').click(function(){
                $('.deleteProduct').val($(this).attr('data-attr'));
            });
            $('.deleteProduct').on('click', function() {
                var product_id = $(this).val();
                if (product_id) {
                    $.ajax({
                        url: "products/" + product_id,
                        type: "Delete",
                        data:{
                            '_token':"{{csrf_token()}}",
                            'id':product_id
                        },
                        success: function(data) {
                            $('#deletemodal').modal('hide');
                            $('.item'+product_id).remove();
                            toastr.success(data.message);
                        },
                        error:function(data) {
                            toastr.error(data.responseJSON.message);
                        }
                    });
                } else {
                    console.log('error occurred. please contact system administrator');
                }
            });

        });

    </script>
@endpush

