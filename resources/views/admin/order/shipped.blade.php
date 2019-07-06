@extends('admin.layouts.master')
@section('content')
    <style>
        .content{
            background: #ffffff;
            margin-top: 1em;
            width: 98%;
        }
        .card{
            padding: 1em;
        }
        .card .create{
            margin-bottom: 0.8em;
            display: inline-table;
        }
        .card .search{
            margin-bottom: 0.8em;
            display: inline-table;
        }
        .card table, th, td{
            border: 1px solid #3c8dbc;
        }
        .card th{
            text-align: center;
            background-color: #3c8dbc;
            border: none;
            color: #fff;
        }
        .status .pending
        {
            padding: 6px;
            background-color: #ff2634;
            color: #fff;
            text-align: center;
            font-weight: bold
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order
            <small>list</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class=" card">
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            {{--                            <a href="{{route('order.create')}}" class="btn btn-primary create">Create</a>--}}
                        </div>
                        <div class="col-md-4 search">
                            <form action="{{route('order.search')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" placeholder="Search for...">
                                    <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                        </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Order date</th>
                            <th>Shipper</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->tel}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->total}}</td>
                                <td class="status">
                                    @if($order->status == 1)
                                        <p class="pending">PENDING</p>
                                    @elseif($order->status == 2)
                                        <p class="approved">APPROVED</p>
                                    @elseif($order->status == 3)
                                        <p class="shipping">SHIPPING</p>
                                    @elseif($order->status == 4)
                                        <p class="cancel">CANCEL</p>
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y',strtotime($order->order_date))}}</td>
                                <td>{!! \App\User::findOrFail($order->shipper_id)->name !!}</td>
                                <td>
                                    <a href="{{route('order.show',$order->id)}}" class="btn btn-primary">Show</a> |
                                    <form action="{!! route('order.shipped',$order->id) !!}" method="post" style="display: inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning">Shipped</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            @if(!count($orders)>0)
                                <td colspan="3"><h2>No orders</h2></td>
                            @endif
                        </tr>

                        </tbody>
                    </table>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
