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
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('brand::brand.brands')}}</li>
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
                                <h3 class="mb-0">{{__('brand::brand.brands')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('brands.create') }}" class="btn btn-sm btn-primary">{{__('brand::brand.add_brand')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body col-12">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('public.id')}}</th>
                                    <th class="text-center">{{__('public.name')}}</th>
                                    <th class="text-center">{{__('public.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $brand_count = 1; @endphp
                            @foreach($brands as $brand)
                                <tr class="item{{$brand->id}}">
                                    <td>{{$brand_count++}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td class="float-right">
                                        <a href="{{route('brands.show',$brand->id)}}" class="edit-modal btn btn-info">
                                            <span class="glyphicon glyphicon-eye"></span> {{__('public.show')}}
                                        </a>
                                        <a href="{{route('brands.edit',$brand->id)}}" class="edit-modal btn btn-info">
                                            <span class="glyphicon glyphicon-edit"></span> {{__('public.edit')}}
                                        </a>
                                        <a data-target="#deletemodal" data-toggle="modal" class="trash text-white delete-modal btn btn-danger" data-attr="{{$brand->id}}">
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
                    <h3 class="modal-title">{{__('brand::brand.delete_brand')}}</h3><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h3>{{__('public.delete_sure')}}</h3>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger deleteBrand" type="button">{{__('brand::brand.delete_brand')}}</button>
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
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable.js?v=1.0.0"></script>
    <script>
        $(document).ready(function() {
            $('.trash').click(function(){
                $('.deleteBrand').val($(this).attr('data-attr'));
            });
            $('.deleteBrand').on('click', function() {
                var brand_id = $(this).val();
                if (brand_id) {
                    $.ajax({
                        url: "brands/" + brand_id,
                        type: "Delete",
                        data:{
                            '_token':"{{csrf_token()}}",
                            'id':brand_id
                        },
                        success: function(data) {
                            $('#deletemodal').modal('hide');
                            $('.item'+brand_id).remove();
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

