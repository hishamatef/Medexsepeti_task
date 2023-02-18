@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.welcome.slider')
    @if(isset($specialOffers))
        @include('layouts.welcome.special-offers')
    @endif
    @if(isset($brands))
        @include('layouts.welcome.brands')
    @endif
    @if(isset($mostViewedProducts))
        @include('layouts.welcome.most-viewed-products')
    @endif
    @if(isset($lastVisitedProducts))
        @include('layouts.welcome.user-last-visited-products')
    @endif
@endsection
