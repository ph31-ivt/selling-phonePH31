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
            <small>Create</small>
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

                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" required id="name">
                        </div>
                        <div class="col-md-4">
                            <label for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" name="price" required id="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="quantily">Quantily:</label>
                            <input type="number" class="form-control" name="quantily" required id="quantily">
                        </div>
                        <div class="col-md-4">
                            <label for="screen">Screen:</label>
                            <input type="text" class="form-control" name="screen" id="screen">
                        </div>
                        <div class="col-md-4">
                            <label for="os">OS:</label>
                            <input type="text" class="form-control" name="os" id="os">
                        </div>
                    </div>

                    {{--details--}}

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="camera">Camera:</label>
                            <input type="text" class="form-control" name="camera" id="camera">
                        </div>
                        <div class="col-md-4">
                            <label for="font_camera">Font Camera:</label>
                            <input type="text" class="form-control" name="font_camera" id="font_camera">
                        </div>

                        <div class="col-md-4">
                            <label for="cpu">Cpu:</label>
                            <input type="text" class="form-control" name="cpu" id="cpu">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="gpu">Gpu:</label>
                            <input type="text" class="form-control" name="gpu" id="gpu">
                        </div>
                        <div class="col-md-4">
                            <label for="ram">Ram:</label>
                            <input type="text" class="form-control" name="ram" id="ram">
                        </div>
                        <div class="col-md-4">
                            <label for="memory">Memory:</label>
                            <input type="text" class="form-control" name="memory" id="memory">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="sim">Sim:</label>
                            <input type="text" class="form-control" name="sim" id="sim">
                        </div>
                        <div class="col-md-4">
                            <label for="Battery_capacity">Battery capacity:</label>
                            <input type="text" class="form-control" name="Battery_capacity" id="Battery_capacity">
                        </div>
                        <div class="col-md-4">
                            <label for="describe">Describe:</label>
                            <textarea  class="form-control" name="describe" id="describe"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <img id="blah" alt="your image" width="100" height="100" style="display: block"/>
                            <label for="images">Images:</label>
                            <input type="file" class="form-control" name="images_up[]" id="images" multiple
                                   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            >
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
