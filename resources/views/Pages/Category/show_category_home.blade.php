@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Products for {{$cate->category_name}}</h2>
                        @foreach($pro as $key=>$pro)
                        <a href="{{URL::to('/detail_product/'.$pro->Product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/upload/products/'.$pro->Product_image)}}" width="200" height="200" alt="" />
                                            <h2>{{number_format($pro->Product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$pro->Product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                        @endforeach
                        
                    </div>
@endsection
