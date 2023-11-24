@extends('frontend.layout.app')

@section('content')

@include('frontend.components.fixed.hero')
@include('frontend.components.brand.brand')
@include('frontend.components.product.featuresProduct')
@include('frontend.components.category.category')
@include('frontend.components.product.product')
@include('frontend.components.Testimonials.testimonials')
@include('frontend.components.product.recentProduct')

@endsection
