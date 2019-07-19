@extends('layouts.master')
@section('sidebar')
    @include('layouts.sideBar')
@endsection

@section('content')
    <div class="row">
        <link rel="stylesheet" href="{{asset('front_end/css/product_grid4.css')}}">
        <div class="col-12">
            <div class="container-fluid">
                <div class="row mb-1 p-0" style="border-bottom: 2px solid #7d7d7d">
                    <h6>Tìm thấy {{count($products)}} kết quả cho từ khóa {{$key}}</h6>
                </div>
            </div>
            <div class="container-fluid pr-0 pl-0">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-2">
                            <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="#">
                                        <img class="pic-1" src="{!! asset('storage/'.$product->images[0]->url) !!}" height="811">
                                        @if(isset($product->images[1]->url))
                                            <img class="pic-2" src="{!! asset('storage/'.$product->images[1]->url) !!}" height="811">
                                        @else
                                            <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">
                                        @endif
                                    </a>
                                    <ul class="social">
                                        <li><a href="{!! route('productDetail',$product->id) !!}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                        <li>
                                            <a href="#" data-tip="Add to Cart"
                                               onclick="event.preventDefault();
                                                   document.getElementById('addCart-form-{{$product->id}}').submit();"
                                            >
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <form action="{!! route('addCart',$product->id) !!}" id="addCart-form-{{$product->id}}" method="post">
                                                @csrf
                                                {{--                                            <button type="submit" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button>--}}
                                            </form>
                                        </li>
                                    </ul>
                                    {{--                                <span class="product-new-label">New</span>--}}
                                    {{--                                <span class="product-discount-label">-10%</span>--}}
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="{!! route('productDetail',$product->id) !!}">{!! $product->name !!}</a></h3>
                                    <div class="price">
                                        {!! number_format($product->price) !!} đ
                                        {{--                                    <span>$16.00</span>--}}
                                    </div>
                                    {{--                                        <a class="add-to-cart" href="">ADD TO CART</a>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
