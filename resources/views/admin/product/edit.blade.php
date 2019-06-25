@extends('admin.layouts.master')
@section('content')
    <style>
        .content{
            background: #ffffff;
            margin-top: 1em;
            width: 98%;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" required id="name" value="{{$product->name}}">
                        </div>
                        <div class="col-md-4">
                            <label for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        @if($product->category_id == $category->id)
                                            selected
                                        @endif
                                    >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" name="price" required id="price" value="{{$product->price}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="quantily">Quantily:</label>
                            <input type="number" class="form-control" name="quantily" required id="quantily" value="{{$product->quantily}}">
                        </div>
                        <div class="col-md-4">
                            <label for="screen">Screen:</label>
                            <input type="text" class="form-control" name="screen" id="screen" value="{{$product->product_Detail->screen}}">
                        </div>
                        <div class="col-md-4">
                            <label for="os">OS:</label>
                            <input type="text" class="form-control" name="os" id="os" value="{{$product->product_Detail->os}}">
                        </div>
                    </div>

                    {{--details--}}

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="camera">Camera:</label>
                            <input type="text" class="form-control" name="camera" id="camera" value="{{$product->product_Detail->camera}}">
                        </div>
                        <div class="col-md-4">
                            <label for="font_camera">Font Camera:</label>
                            <input type="text" class="form-control" name="font_camera" id="font_camera" value="{{$product->product_Detail->font_camera}}">
                        </div>
                        <div class="col-md-4">
                            <label for="cpu">Cpu:</label>
                            <input type="text" class="form-control" name="cpu" id="cpu" value="{{$product->product_Detail->cpu}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="ram">Ram:</label>
                            <input type="text" class="form-control" name="ram" id="ram" value="{{$product->product_Detail->ram}}">
                        </div>
                        <div class="col-md-4">
                            <label for="memory">Memory:</label>
                            <input type="text" class="form-control" name="memory" id="memory" value="{{$product->product_Detail->memory}}">
                        </div>
                        <div class="col-md-4">
                            <label for="sim">Sim:</label>
                            <input type="text" class="form-control" name="sim" id="sim" value="{{$product->product_Detail->sim}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="images">Images:</label>
                            <input type="file" class="form-control" name="images_up[]" id="images" multiple>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
