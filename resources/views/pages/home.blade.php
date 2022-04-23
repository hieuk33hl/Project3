@extends('layout')
@section('content')
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Sản phẩm mới </h2>
        @foreach ($product as $item)
            <a href="{{ URL::to('/chi-tiet-san-pham/' . $item->id_product) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <form method="post" action="{{ URL::to('/save-cart') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{ $item->id_product }}" />
                                <input name="qty" value="1" min="1" type="hidden" />
                                <div class="productinfo text-center">
                                    <a href="{{ URL::to('/chi-tiet-san-pham/' . $item->id_product) }}">
                                        <img src="{{ $item->image }}" />
                                    </a>
                                    <h2>{{ '$' . number_format($item->price) }}</h2>
                                    <p>{{ $item->name }}</p>
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach


    </div>
    <!--features_items-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sản phẩm gợi ý</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($related_products as $item)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <form method="post" action="{{ URL::to('/save-cart') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_id" value="{{ $item->id_product }}" />
                                        <input name="qty" value="1" min="1" type="hidden" />
                                        <div class="productinfo text-center">
                                            <a href="{{ URL::to('/chi-tiet-san-pham/' . $item->id_product) }}">
                                                <img src="{{ $item->image }}" />
                                            </a>
                                            <h2>{{ '$' . number_format($item->price) }}</h2>
                                            <p>{{ $item->name }}</p>
                                            <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="item">
                    @foreach ($related_products2 as $item)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <form method="post" action="{{ URL::to('/save-cart') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_id" value="{{ $item->id_product }}" />
                                        <input name="qty" value="1" min="1" type="hidden" />
                                        <div class="productinfo text-center">
                                            <a href="{{ URL::to('/chi-tiet-san-pham/' . $item->id_product) }}">
                                                <img src="{{ $item->image }}" />
                                            </a>
                                            <h2>{{ '$' . number_format($item->price) }}</h2>
                                            <p>{{ $item->name }}</p>
                                            <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
@endsection
