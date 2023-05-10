@extends('frontend.main')

@section('title',$title)

@section('pageTitle',$title)

@section('content')
    <!-- HOME SLIDER  -->
    @include('frontend.home.slider')

    <!-- BANNERS  -->
    @include('frontend.home.banners')

    <!-- FEATURED CATEGORIES  -->
    @include('frontend.home.featured_category')

    <!-- NEW PRODUCTS  -->
    @include('frontend.home.new_products')

    <!-- VENDORS  -->
    @include('frontend.home.vendors')

@endsection
