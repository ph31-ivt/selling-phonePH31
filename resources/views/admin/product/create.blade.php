@extends('admin.layouts.master')
@section('content')
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
            <div class="col-md-6 col-md-offset-3">
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
                <form action="{{route('product.store')}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" required id="name">
                        </div>
                        <div class="col-md-4">
                            <label for="category_id">Category:</label>
                            <input type="text" class="form-control" name="category_id" required id="category_id">
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
                            <label for="ram">Ram:</label>
                            <input type="text" class="form-control" name="ram" id="ram">
                        </div>
                        <div class="col-md-4">
                            <label for="memory">Memory:</label>
                            <input type="text" class="form-control" name="memory" id="memory">
                        </div>
                        <div class="col-md-4">
                            <label for="sim">Sim:</label>
                            <input type="text" class="form-control" name="sim" id="sim">
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
