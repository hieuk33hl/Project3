<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/price-range.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('frontend') }}/js/html5shiv.js"></script>
    <script src="{{ asset('frontend') }}/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('frontend') }}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('frontend') }}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('frontend') }}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('frontend') }}/images/ico/apple-touch-icon-57-precomposed.png">

</head>
<!--/head-->

<body>

    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ URL::to('/') }}"><img src="{{ asset('frontend') }}/images/home/logo.png"
                                    alt="" /></a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="{{ URL::to('/invoice-history') }}"><i class="fa fa-user"></i> T??i
                                        kho???n</a>
                                </li>
                                <li><a href="#"><i class="fa fa-star"></i> Y??u th??ch</a></li>
                                {{-- <li><a href=""><i class="fa fa-crosshairs"></i> Thanh to??n</a></li> --}}
                                <li><a href="{{ URL::to('/show-cart') }}"><i class="fa fa-shopping-cart"></i> Gi???
                                        h??ng</a></li>

                                <?php
                                $customer_id = Session::get('customer_id');
                                ?>
                                @if ($customer_id != null)
                                    <li><a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-lock"></i>
                                            ????ng
                                            xu???t</a></li>
                                @else
                                    <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i>
                                            ????ng
                                            nh???p</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ URL::to('/trang-chu') }}" class="active">Trang ch???</a></li>
                                <li> <a href="#">S???n ph???m</a>
                                </li>
                                <li> <a href="#">Tin t???c</a>
                                </li>
                                <li><a href="#l">Gi??? h??ng</a></li>
                                <li><a href="#">Li??n h???</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form method="post" action="{{ URL::to('/tim-kiem') }}">
                                {{ csrf_field() }}
                                <input type="text" placeholder="Search" name="keyword_submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('frontend') }}/images/home/girl1.jpg"
                                        class="girl img-responsive" alt="" />
                                    <img src="{{ asset('frontend') }}/images/home/pricing.png" class="pricing"
                                        alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('frontend') }}/images/home/girl2.jpg"
                                        class="girl img-responsive" alt="" />
                                    <img src="{{ asset('frontend') }}/images/home/pricing.png" class="pricing"
                                        alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('frontend') }}/images/home/girl3.jpg"
                                        class="girl img-responsive" alt="" />
                                    <img src="{{ asset('frontend') }}/images/home/pricing.png" class="pricing"
                                        alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh m???c s???n ph???m</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach ($category as $item)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                href="{{ URL::to('/danh-muc-san-pham/' . $item->id_category) }}">{{ $item->name_cat }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Th????ng hi???u s???n ph???m</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($supplier as $item)
                                        <li><a href="{{ URL::to('/thuong-hieu-san-pham/' . $item->id_supplier) }}">
                                                <span class="pull-right"></span>{{ $item->name_sup }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        <!--/brands_products-->


                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    {{-- home  page --}}
                    @yield('content')
                    {{-- end home page --}}
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ???s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright ?? 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">NMHieu</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('frontend') }}/js/jquery.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('frontend') }}/js/price-range.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>
</body>

</html>
