<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BookStore</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('front_end/dist/css/bootstrap.min.css')}}">
    <script src="{{asset('front_end/dist/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('front_end/fontawesome/css/all.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .containers{
            max-width: 85%;
            margin: 0 auto;
            padding: 0;
        }
        #header{
            /*margin-bottom: 1em;*/
        }
        .content_header_two{
            background-color: #252525;
            padding: 0.5em;
        }
        .content_header_two .container-fluid .login li a{
            color: #ffffff;
        }
        .content_header_two .container-fluid .login li .no-hover:hover{
            background-color: #252525;
            color: #000000;
        }
        .content_header_two .container-fluid .login li a:hover{
            color: #000000;
            background-color: #ffffff;
        }
        .content_header_two .container-fluid .login li .dropdown-menu{
            background-color: #252525;
        }
        .content_header_two .container-fluid .login li .dropdown-menu .dropdown-item:hover{
            background-color: #ffffff;
        }
        .form-search{
        }
        .total{
            border-radius: 50%;
            background: red;
            padding: 0 0.4em;
            color: white;
        }
        /*.cart{*/
        /*margin-top: 4%;*/
        /*}*/
        .nav_sidebar{
            border: 2px solid #1a87f4;
        }
        #slide_top{
            z-index: 0;
        }
        .side_bar{
            margin-bottom: 0.5em;
            margin-top: 1em;
        }
        #footer{
            border-top: 5px solid #000000;
            background-color: #f5f5f5;
            color: #000000;
            margin-top: 1em;
        }
        #footer .footer-content-one .col-md-2 ul li a,
        #footer .footer-content-one .col-md-3 ul li a {
            color: #000000;
        }
        #footer .footer-content-one{
            padding-top: 1em;
            width: 90%;
            margin: 0 auto;
        }
        /*.cart-list a:hover{*/
        /*text-decoration: none;*/
        /*color: #000000;*/
        /*}*/
        /*.cart-list a{*/
        /*color: #000;*/
        /*}*/
        .content_header_three{
            background-color: #616161;
        }
        .content_header_three a{
            color: #fff;
            font-size: 16px;
        }
        .content_header_three .dropdown-menu{
            background-color: #616161;
        }
        .content_header_three .dropdown-menu .dropdown-item:hover{
            background-color: #ffffff;
            color: #000000;
        }
    </style>
</head>
<body>
<div class="containers">
    <div id="header" class="container-fluid">
        <div class="navbar navbar-expand-md navbar-light navbar-laravel row">
            <p class="navbar-nav mr-auto">infor@bookstore.com | 0839158372</p>
            <a class="navbar-nav ml-auto" href="#" style="color: #000000"><i class="fas fa-blog fa-2x"></i></a>
            <a class="navbar-nav ml-2" href="#" style="color: #000000"><i class="fab fa-facebook fa-2x"></i></a>
        </div>

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel row content_header_two">
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold" href="" style="color: #fff;">CellPhone
                    <img src="{{asset('image/logo-white.png')}}" width="250" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <form action="" method="get" class="navbar-nav col-md-7 my-2 my-lg-0 ml-auto">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="key" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto login">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-1">
                                <a class="nav-link btn btn-outline-light" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-light" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="color:#fff;">
                                    <style>
                                        .image{
                                            overflow: hidden;
                                            float: left;
                                            margin-right: 10px;
                                            margin-bottom: 0;
                                            margin-top: 0;
                                        }
                                        .image img{
                                            border-radius: 50%;
                                        }
                                    </style>
                                    <p class="image"><img src="https://salt.tikicdn.com/desktop/img/avatar.png?v=3" height="25" width="25" alt=""></p>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">
                                        Cập nhật thông tin
                                    </a>
                                    <a class="dropdown-item" href="">
                                        Quản lý đơn hàng
                                    </a>
                                    <a class="dropdown-item" href="">
                                        Đổi mật khẩu
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link no-hover" href="">
                                <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                                <sub class="total">2</sub>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        {{--        <nav class="navbar navbar-expand-md navbar-light navbar-laravel row content_header_three">--}}
        <ul class="nav row content_header_three justify-content-center">
            <li class="nav-item"><a href="" class="nav-link">Trang chủ</a></li>
            <li class="nav-item"><a href="" class="nav-link">Giới thiệu</a></li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item"><a href="" class="nav-link">Liên hệ</a></li>
        </ul>
        {{--        </nav>--}}
    </div>

    <div class="side_bar">
        <div class="row">
            <div class="col-md-8">
                <div id="slide_top" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#slide_top" data-slide-to="0" class="active"></li>
                        <li data-target="#slide_top" data-slide-to="1"></li>
                        <li data-target="#slide_top" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('storage/images/slide1.png')}}" width="100%" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('storage/images/slide2.png')}}" width="100%" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('storage/images/slide3.png')}}" width="100%" alt="">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#slide_top" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#slide_top" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
            <div class="col-md-4">
                <ul class="navbar-nav">
                    <li class="nav-item"><img src="{{asset('storage/images/topside1.png')}}" width="100%" alt=""></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="main" class="">

        @yield('content')

    </div>

    <div id="footer" class="container-fluid">
        <div class="footer-content-one row">
            <div class="col-md-4">
                <h4 class="title">About the company</h4>
                <p>bookstore.com nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống Fahasa trên toàn quốc.</p>
            </div>
            <div class="col-md-2">
                <h4 class="title">Quick link</h4>
                <ul class="nav flex-column row">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Samsung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Samsung</a>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Samsung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Samsung</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">
                <h4 class="title">LIÊN HỆ</h4>
                <ul class="nav flex-column row">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marker-alt"></i> 21 Lê Duẩn Street Đà Nẵng, Việt Nam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-phone"></i> 01237281490</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> hovannhan.php@gmail.com</a>
                    </li>
                </ul>
                <ul class="nav justify-content-center row">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/nhanFieuzinthewind" class="nav-link p-0"><i class="fab fa-facebook fa-2x"></i>&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link  p-0"><i class="fab fa-twitter-square fa-2x"></i>&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/Nhan10" class="nav-link  p-0"><i class="fab fa-github fa-2x"></i>&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link  p-0"><i class="fas fa-envelope fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="button-footer">Design by hovannhan.php@gmail.com</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>