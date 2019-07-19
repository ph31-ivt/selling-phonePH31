@extends('admin.layouts.master')
@section('content')
    <style>
        .content{
            background: #ffffff;
            margin-top: 1em;
            width: 98%;
        }
        .card .create{
            margin-bottom: 0.8em;
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
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Comment
            <small>list</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-tablet"></i> Comment</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 card">
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
                        <div class="col-md-4" style="float: right">
                            <form action="#" method="get">
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
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantily</th>
                            <th>Total Comment</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if(count($product->images)>0)
                                        <img src="{{asset('storage/'.$product->images[0]->url)}}" width="80px">
                                    @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{number_format($product->price)}} đ</td>
                                <td>{{$product->quantily}}</td>
                                <td>{{$product->comments_count}}</td>
                                <td>
                                    <form action="{{route('comment.show',$product->id)}}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Show comment</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if(!count($products)>0)
                            <tr>
                                <td colspan="7"><h2>No comment</h2></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
