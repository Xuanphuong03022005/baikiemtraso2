@extends('index')
@include('header')
@include('footer')
@include('slider')
@section( 'content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($products)}} sản phẩm được tìm thấy</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($products as $key => $new_product)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new_product->promotion_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{ asset('assets/dest/images/products/'.$new_product->image) }}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new_product->name}}</p>
                                        <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                                            @if($new_product->promotion_price==0)
                                            <span class="flash-sale">{{ number_format($new_product->unit_price) }} đồng</span>
                                            @else
                                            <span class="flash-del">{{ number_format($new_product->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{ number_format($new_product->promotion_price) }} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('add_cart', $new_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('detail', $new_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @if(($key + 1) % 4 == 0)
                            <div class="space40">&nbsp;</div>
                            @endif
                            @endforeach
                        </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Promotion Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{ $number_promotion }} styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($promotion as $key => $value)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>

                                        <div class="single-item-header">
                                            <a href="product.html"><img src="{{ asset('assets/dest/images/products/'.$value->image) }}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $value->name }}</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">${{ $value->unit_price }}</span>
                                                <span class="flash-sale">${{ $value->promotion_price }}</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $promotion->links('pagination::bootstrap-4') }}
                        </div>

                    </div> <!-- .beta-products-list -->
                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left"> {{ $number_top }} styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_top as $key => $new_product)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new_product->promotion_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{ asset('assets/dest/images/products/'.$value->image) }}"  alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new_product->name}}</p>
                                        <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                                            @if($new_product->promotion_price==0)
                                            <span class="flash-sale">{{ number_format($new_product->unit_price) }} đồng</span>
                                            @else
                                            <span class="flash-del">{{ number_format($new_product->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{ number_format($new_product->promotion_price) }} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('add_cart', $new_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('detail', $new_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @if(($key + 1) % 4 == 0)
                            <div class="space40">&nbsp;</div>
                            @endif
                            @endforeach
                        </div> <!-- .beta-products-list -->

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection