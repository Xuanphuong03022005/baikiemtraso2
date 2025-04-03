@extends('index')
@include('header')
@include('footer')
@section('content')
<div class="product-container">
    @foreach($products   as $key => $value)
    <div class="product-item">
        <img src="{{ asset('assets/dest/images/products/'.$value->image) }}" alt="Bánh Crepe Táo" class="product-image">
        <h3 class="product-title">{{ $value->name }}</h3>
        <p class="product-price">{{ number_format($value->unit_price) }} đồng</p>
        <a href="#" class="product-button">Chi tiết</a>
    </div>
    @endforeach
</div>
@endsection
