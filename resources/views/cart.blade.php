@extends('layouts.master')
@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-7">
            <div class="row cart-content-status">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="row cart-content-top">
                <p>GIỎ HÀNG CỦA BẠN<span>({!! $cart_contents->count() !!} sản phẩm)</span></p>
                <a href="/homepages" class="ml-auto">Mua thêm sản phẩm khác</a>
            </div>
            @foreach($cart_contents as $cart)
                <div class="row cart-content-cart mb-2 border pt-2 pb-2">
                    <div class="col-md-2"><img src="{!! asset('storage/'.$cart['attributes']->img) !!}" class="img-thumbnail" width="100" alt=""></div>
                    <div class="col-md-4"><a href="">{!! $cart->name !!}</a></div>
                    <div class="col-md-2">{!! number_format($cart->price) !!} đ</div>
                    <div class="col-md-3 m-0" id="qty">
                        <style>
                            #qty{
                                width: 100%;
                                margin: 0px 0px;
                            }
                            #qty P{
                                margin-bottom: 20px;
                            }
                            #qty input{
                                width: 50px;
                                text-align: center;
                                height: 35px;
                            }
                            #qty button{
                                background-color: #ffffff;
                                border: none;
                            }
                            #qty button i{
                                font-size: 20px;
                            }
                            #qty p
                            {
                                display: inline-table;
                            }
                        </style>
                        <button type="button" id="reduction"><i class="far fa-minus-square"></i></button>
                        <input type="hidden" name ="id_product" value="">
                        <input id="quaty" type="text" name="qty" value="{!! $cart->quantity !!}" step="1" min="1" max="5" autocomplete="off">
                        <button type="button" id="increase"><i class="far fa-plus-square"></i></button>
                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                var max = parseInt( $("#quaty").attr("max"));
                                var min = parseInt($("#quaty").attr("min"));
                                $("#reduction").click(function(){

                                    var qty = parseInt($("#quaty").val());
                                    if(qty===1){
                                        $("#quaty").val(1);
                                    }
                                    else {
                                        $("#quaty").val(qty-1);

                                    }
                                });
                                $("#increase").click(function(){
                                    var qty = parseInt( $("#quaty").val());
                                    if(qty===5){
                                        $("#quaty").val(5);
                                    }
                                    else{
                                        $("#quaty").val(qty+1);
                                    }
                                });
                            });
                        </script>
                    </div>
                    <div class="col-md-1"><a href="{!! route('removeCart',$cart->id) !!}"><i class="fas fa-trash"></i></a></div>
                </div>
            @endforeach
            <div class="row cart-content-total border mb-2">
                <div class="title p-2"><h5>Thông tin đơn hàng</h5></div>
                <div class="container">
                    <p >Tổng tiền: <span>{!! number_format($total) !!} đ</span></p>
                </div>
            </div>
            <div class="row cart-content-submit">
                <a href="{!! route('orderConfirm') !!}" class="btn btn-danger">Xác nhận đơn hàng</a>
            </div>
        </div>
    </div>
@endsection