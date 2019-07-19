@extends('layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3 card">
                <div class="row">
                    <style>
                        .nav-bar {
                            list-style-type: none;
                            margin: 0;
                            padding: 0;
                            width: 100%;
                        }

                        .nav-bar h5 {
                            text-align: center;
                            padding: 0.6em 0 0.1em 0;
                        }

                        .nav-bar li a {
                            display: block;
                            color: #000;
                            font-size: 1em;
                            font-weight: bold;
                            padding: 8px 16px;
                            text-decoration: none;
                            border-bottom: 1px solid #fff;
                        }

                        .nav-bar li a:hover {
                            background-color: #1a87f4;
                            color: #fff;
                        }
                    </style>
                    <ul class="nav-bar">
                        <h5>DANH MỤC SẢN PHẨM</h5>
                        @foreach($categories as $category)
                            <li class="thefirst">
                                <a href="{!! route('getProductByCategory',$category->id) !!}">
                                    {{$category->name}}
                                    <span class="results-count">
                                    ({{$category->products()->count()}})
                                </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 card">
                <div class="container-fluid">

                    <link rel="stylesheet" href="{{asset('front_end/css/product_grid4.css')}}">
                    @if(isset($products))
                        <div class="row pt-md mt-2 mb-2">

                            @foreach($products as $product)
                                <div class="col-md-3 mb-2">
                                    <div class="product-grid4">
                                        <div class="product-image4">
                                            <a href="#">
                                                <img class="pic-1"
                                                     src="{!! asset('storage/'.$product->images[0]->url) !!}"
                                                     height="811">
                                                @if(isset($product->images[1]->url))
                                                    <img class="pic-2"
                                                         src="{!! asset('storage/'.$product->images[1]->url) !!}"
                                                         height="811">
                                                @else
                                                    <img class="pic-2"
                                                         src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">
                                                @endif
                                            </a>
                                            <ul class="social">
                                                <li><a href="{!! route('productDetail',$product->id) !!}"
                                                       data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#" data-tip="Add to Wishlist"><i
                                                                class="fa fa-shopping-bag"></i></a></li>
                                                <li>
                                                    <a href="#" data-tip="Add to Cart"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('addCart-form-{{$product->id}}').submit();"
                                                    >
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <form action="{!! route('addCart',$product->id) !!}"
                                                          id="addCart-form-{{$product->id}}" method="post">
                                                        @csrf
                                                        {{--                                            <button type="submit" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button>--}}
                                                    </form>
                                                </li>
                                            </ul>
                                            {{--                                <span class="product-new-label">New</span>--}}
                                            {{--                                <span class="product-discount-label">-10%</span>--}}
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="#">{!! $product->name !!}</a></h3>
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
                        {{$products->links()}}
                    @endif
                    @if(isset($productBycategory))
                        <div class="row pt-md mt-2 mb-2">

                            @foreach($productBycategory as $product)
                                <div class="col-md-3 mb-2">
                                    <div class="product-grid4">
                                        <div class="product-image4">
                                            <a href="#">
                                                <img class="pic-1"
                                                     src="{!! asset('storage/'.$product->images[0]->url) !!}"
                                                     height="811">
                                                @if(isset($product->images[1]->url))
                                                    <img class="pic-2"
                                                         src="{!! asset('storage/'.$product->images[1]->url) !!}"
                                                         height="811">
                                                @else
                                                    <img class="pic-2"
                                                         src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">
                                                @endif
                                            </a>
                                            <ul class="social">
                                                <li><a href="{!! route('productDetail',$product->id) !!}"
                                                       data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#" data-tip="Add to Wishlist"><i
                                                                class="fa fa-shopping-bag"></i></a></li>
                                                <li>
                                                    <a href="#" data-tip="Add to Cart"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('addCart-form-{{$product->id}}').submit();"
                                                    >
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <form action="{!! route('addCart',$product->id) !!}"
                                                          id="addCart-form-{{$product->id}}" method="post">
                                                        @csrf
                                                        {{--                                            <button type="submit" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button>--}}
                                                    </form>
                                                </li>
                                            </ul>
                                            {{--                                <span class="product-new-label">New</span>--}}
                                            {{--                                <span class="product-discount-label">-10%</span>--}}
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="#">{!! $product->name !!}</a></h3>
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
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection