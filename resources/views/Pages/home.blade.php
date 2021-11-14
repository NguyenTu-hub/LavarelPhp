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
                                            <form>
                                                @csrf
                                                <input type="hidden" value="{{$pro->Product_id}}" class="cart_product_id_{{$pro->Product_id}}">
                                                <input type="hidden" value="{{$pro->Product_name}}" class="cart_product_name_{{$pro->Product_id}}">
                                                <input type="hidden" value="{{$pro->Product_image}}" class="cart_product_image_{{$pro->Product_id}}">
                                                <input type="hidden" value="{{$pro->Product_price}}" class="cart_product_price_{{$pro->Product_id}}">
                                                 <input type="hidden" value="1" class="cart_product_qty_{{$pro->Product_id}}">
                                            <img src="{{URL::to('public/upload/products/'.$pro->Product_image)}}" width="200" height="200" alt="" />
                                            <h2>{{number_format($pro->Product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$pro->Product_name}}</p>
                                            <!-- <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button> -->
                                            </a>
                                            <button type="button" class="btn btn-default add-to-cart" data-id="{{$pro->Product_id}}" name="add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    
                         </form>
                        @endforeach
                        
                    </div>
@endsection
