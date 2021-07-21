@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">New Items</h2>
                        @foreach($all_product as $key=>$pro)
                        <form action="{{URL::to('/save_cart')}}" method="POST">
                            {{ csrf_field() }}
                        <a href="{{URL::to('/detail_product/'.$pro->Product_id)}}">
                        <input type="hidden" name="productid_hidden" value="{{$pro->Product_id}}">
                        <input type="hidden" name="qty" value="1">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/upload/products/'.$pro->Product_image)}}" width="200" height="200" alt="" />
                                            <h2>{{number_format($pro->Product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$pro->Product_name}}</p>
                                            <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                         </form>
                        @endforeach
                        
                    </div>
@endsection
