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
            <small>Images</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-tablet"></i> Product</a></li>
            <li class="active">Images</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <h2 style="margin-top: 0;text-align: center;">PRODUCT #{!! $product->id !!} IMAGES</h2>
            <hr style="margin: 0;">
        </div>
        <div class="row">
            <div class=" card">

                <div class="container-fluid">

                    <div class="col-md-6 order_info">
                        <ul>
                            <li><p>Product id:</p> <span>#{!! $product->id !!}</span></li>
                            <li><p>Product name:</p> <span>{!! $product->name !!}</span></li>
                            <li><p>Category:</p><span>{!! $product->category->name !!}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6 order_info">
                        <ul>
                            <li><p>Quantity:</p> <span>{!! $product->quantily !!}</span></li>
                            <li><p>Price:</p><span>{!! number_format($product->price) !!} đ</span></li>
                        </ul>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{route('product.createImage',$product->id)}}" class="btn btn-primary create">Add images</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <style>
                        .thumbnail{
                            position: relative;
                            border: 1px solid #BDC3C7;

                            padding: 10px;
                            margin: 5px;
                            background-color: #EAEDF2;
                        }
                        .frow{
                            position: relative;

                        }
                        .frow,.secrow,.thirdrow{
                            margin: 5px 0;
                        }

                        .secrow{
                            position: relative;
                        }
                    </style>
                    <div class="row">
                        @foreach($imageOfProducts as $image)
                        <div class="col-sm-3 col-xs-6">
                            <div class="thumbnail">
                                <div class="frow">
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-{!! $image->id !!}"><i class="fa fa-edit"></i></a>
                                    <form action="{!! route('product.destroyImage',$image->id) !!}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i></button>
                                    </form>

                                </div>
                                <div class="secrow">
                                    <img src="{!! asset('storage/'.$image->url) !!}" alt="" class="img-responsive" width="200">
                                </div>
                            </div>
                        </div>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal-{!! $image->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Image</h4>
                                        </div>
                                        <form action="{!! route('product.updateImage',$image->id) !!}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body container">
                                            <div class="col-md-10 col-md-offset-1">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <div class="col-md-4 @error('images_up') has-error @enderror">
                                                        <img id="blah-{{$image->id}}" src="{{ asset('storage/'.$image->url) }}" alt="your image" width="100" height="100" style="display: block"/>
                                                        <label for="images">Images <sup class="title-danger">*</sup>:</label>
                                                        <input type="file" @error('images_up') id="inputError" @enderror class="form-control" required name="images_up[]" id="images" multiple
                                                               onchange="document.getElementById('blah-{{$image->id}}').src = window.URL.createObjectURL(this.files[0])"
                                                        >
                                                        @error('images_up')
                                                        <span class="help-block"><strong>{{$message}}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
