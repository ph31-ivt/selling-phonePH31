@extends('layouts.master')
@section('content')
    <style>
        .menu-nd {
            background-color: #f4f4f4;
        }

        .menu-nd ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
        }

        .menu-nd ul li a {
            display: block;
            color: #333;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 0;
            text-decoration: none;
        }

        .menu-nd ul li a.active {
            background-color: #f4f4f4;
            color: #333;
        }

        .menu-nd ul li a:hover:not(.active) {
            background-color: #c6c9c9;
            color: #333;
        }

        .menu-nd ul li a i {
            font-size: 18px;
            height: auto;
            text-align: center;
            width: 40px;
            margin: auto;
            color: #999;
        }

        .profiles {
            background: 0 0;
            padding: 10px 5px 5px;
            background-color: #f1f1f1;
            border-bottom: 1px solid #ffffff;
        }

        .profiles .image {
            width: 45px;
            height: 45px;
            overflow: hidden;
            float: left;
            margin-right: 10px;
            margin-bottom: 0;
        }

        .profiles .image img {
            border-radius: 50%;
        }

        .profiles .name {
            font-size: 13px;
            margin-bottom: 4px;
            color: #242424;
            margin-top: 4px;
            font-family: Roboto;
            font-weight: 300;
        }

        .profiles h6 {
            margin: 0;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
            font-stretch: normal;
            color: #242424;
        }

        .content-right {
            background-color: #f1f1f1;
        }

        .have-margin {
            margin-bottom: 15px;
            font-family: Roboto;
            font-size: 19px;
            font-weight: 300;
            font-style: normal;
            font-stretch: normal;
            color: #242424;

        }

        .payment-2 h3, .address-1 h3 {
            font-weight: 400;
            margin-top: 0;
            margin-bottom: 15px;
            font-family: Roboto;
            font-size: 13px;
            text-transform: uppercase;
            color: #242424;
        }

        .address-1 p, .payment-2 p {
            font-size: 13px;
            margin-top: 5px;
            margin-bottom: 0;
        }

        .address-1 .name {
            font-weight: 500;
            color: #242424;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
    </style>
    <div class="container-fluid">
        <div class="row mt-2">

            @include('partials.menu_profile')
            <div class="col-md-9">
                <div class="content-right row  ml-0 p-0">
                    <div class="container">
                        <div class="row">
                            <h1 class="have-margin col-md-6 mb-3 mt-3">Chi tiết đơn hàng #{{$ordered->id}}
                                - @if($ordered->status == 1)
                                    Đang xử lý
                                @elseif($ordered->status == 2)
                                    Đã xử lý
                                @elseif($ordered->status == 3)
                                    Đang giao
                                @elseif($ordered->status == 4)
                                    Giao hàng thành công
                                @elseif($ordered->status == 5)
                                    Bị hủy bỏ
                                @endif
                            </h1>
                            <p class="date col-md-6" style="margin-top: 16px;text-align: right">
                                <span>Ngày đặt hàng:  </span>{{date('H:i d-m-Y', strtotime($ordered->order_date))}}</p>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 pr-1 address-1">
                                <h3>Địa chỉ người nhận</h3>
                                <div class="card p-2">
                                    <p class="name mt-0">{{$ordered->name}}</p>
                                    <p class="mt-0"><span>Địa chỉ: </span>{{$ordered->address}}</p>
                                    <p><span>Điện thoại: </span>{{$ordered->tel}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1 payment-2">
                                <h3>Hình thức thanh toán</h3>
                                <div class="card p-2">
                                    <p>Thanh toán tiền mặt khi nhận hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded my-3 p-4 ">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Giảm giá</th>
                                    <th>Tạm tính</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_details as $order_detail)
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/'.$order_detail->product->images[0]->url)}}"
                                                 width="50" alt="{{$order_detail->product->name}}">
                                        </td>
                                        <td>
                                            <a href="{{route('productDetail',$order_detail->product_id)}}">{{$order_detail->product->name}}</a>
                                        </td>
                                        <td>{{number_format($order_detail->price)}}&nbsp;₫</td>
                                        <td>{{$order_detail->quantily}}</td>
                                        <td>0 &nbsp;₫</td>
                                        <td>{{number_format($order_detail->total_detail)}}&nbsp;₫</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table>
                                <tbody style="text-align: right;">
                                <!--Total Summary List-->
                                <tr>
                                    <td colspan="4">
                                        <span>Tổng tạm tính</span>
                                    </td>
                                    <td>{{number_format($ordered->total)}}&nbsp;₫</td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <span>Phí vận chuyển</span>
                                    </td>
                                    <td>0&nbsp;₫</td>
                                </tr>

                                <!--Final Total-->
                                <tr>
                                    <td colspan="4"><span>Tổng cộng</span></td>
                                    <td><span style="color: #ff3b27;font-size: 18px;">{{number_format($ordered->total)}}&nbsp;₫</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{route('order_manager')}}" class="btn-simple pb-2 pl-2">&lt;&lt; Quay lại
                        đơn hàng của
                        tôi</a>
                </div>
            </div>
        </div>
    </div>

@endsection