@extends('layout')
@section('content')
    <div class="features_items">
        <!--features_items-->
        @foreach ($category_name as $item)
            <h2 class="title text-center">{{ $item->name_cat }}</h2>
        @endforeach

        @foreach ($product as $item)
            <a href="{{ URL::to('/chi-tiet-san-pham/' . $item->id_product) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ $item->image }}" alt="" />
                                <h2>{{ '$' . number_format($item->price) }}</h2>
                                <p>{{ $item->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                    cart</a>
                            </div>
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
@endsection
