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
            display: inline-table;
            width: 100px;
            padding: 6px;
            background-color: #ff2634;
            color: #fff;
            text-align: center;
            font-weight: bold
        }
        .order_info ul li{
            list-style-type: none;
        }
        .order_info ul li p{
            width: 110px;
            display: inline-table;
            text-align: end;
            margin-right:2em;
            color: #000000;
            font-weight: bold;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
            <small>Images/add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-tablet"></i> Product</a></li>
            <li class="active">Images/add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <h2 style="margin-top: 0;text-align: center;">PRODUCT #{!! $product->id !!}</h2>
            <hr style="margin: 0;">
        </div>
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
                <div class="container-fluid">

                    <div class="col-md-6 order_info">
                        <ul>
                            <li><p>Product id:</p> <span>#{!! $product->id !!}</span></li>
                            <li><p>Product name:</p> <span>{!! $product->name !!}</span></li>
                            <li><p>Category:</p><span>{!! $product->category->name !!}</span></li>
                            <li><p>Price:</p><span>{!! number_format($product->price) !!} đ</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6 order_info">
                        <ul>
                            <li><p>Quantity:</p> <span>{!! $product->quantily !!}</span></li>
                            <li><p>Order date:</p>  <span>NULL</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form action="{!! route('product.storeImage',$product->id) !!}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4 @error('images_up') has-error @enderror">
                                    <img id="blah" alt="your image" width="100" height="100" style="display: block"/>
                                    <label for="images">Images <sup class="title-danger">*</sup>:</label>
                                    <input type="file" @error('images_up') id="inputError" @enderror class="form-control" required name="images_up[]" id="images" multiple
                                           onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                                    >
                                    @error('images_up')
                                    <span class="help-block"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{!! route('product.getImage',$product->id) !!}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
