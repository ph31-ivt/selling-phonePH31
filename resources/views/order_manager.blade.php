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
    </style>
    <div class="container-fluid">
        <div class="row mt-2">

            @include('partials.menu_profile')
            <div class="col-md-9">
                <div class="content-right row  ml-0 p-0">
                    <h1 class="have-margin container mb-0 mt-3">Đơn hàng của tôi</h1>
                    <div class="container">
                        <div class="card rounded my-3 p-4 ">
                            <table class="table">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày mua</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái đơn hàng</th>
                                </tr>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><a href="{!! route('order_manager_detail',[$order->name,$order->id]) !!}">{{$order->id}}</a></td>
                                        <td>{{date("d-m-Y", strtotime($order->order_date))}}</td>
                                        <td>
                                            @foreach($order->order_details as $order_details)
                                                <p>{{$order_details->product->name}}</p>
                                            @endforeach
                                        </td>
                                        <td>{{number_format($order->total)}} đ</td>
                                        <td>
                                            {{$order->status->name}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection