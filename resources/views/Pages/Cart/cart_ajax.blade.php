@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
				@if(session()->has('message'))
				<div class="alert alert-success">
					{{session()->get('message')}}
				</div>
				@endif
			<div class="table-responsive cart_info"> 
				<form action="{{url('/update_cart_ajax')}}" method="POST">
					{{ csrf_field() }}
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<!-- 	@php
						echo '<pre>';
						print_r(Session::get('cart'));
					echo '</pre>';
						@endphp -->
						@php
						$total=0;
						@endphp
					@foreach(Session::get('cart') as $key)
						@php
							$subtotal=$key['product_price']*$key['product_qty'];
							$total+=$subtotal
						@endphp
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('public/upload/products/'.$key['product_image'])}}" width="30" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""></a></h4>
								<p>{{$key['product_name']}}</p>
							</td>
							<td class="cart_price">
								<p>{{$key['product_price']}}</p>
							</td>
							<td class="cart_quantity"> 
								<form action="" method="POST">
									{{ csrf_field() }}
								<div class="cart_quantity_button">
									<input class="cart_quantity_update" type="number" min="1" name="cart_quantity[{{$key['session_id']}}]" data-session_id="{{$key['session_id']}}"  value="{{$key['product_qty']}}">
									
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									{{$subtotal}}
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/delete_sp/'.$key['session_id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach
						<td><li>Cart Total <span>{{$total.' '.'vnd'}}</span></li></td>
						<tr>
							<td><input type="submit" value="Update" name="btn_update" class="btn btn-default btn-sm check_out"></td></tr>
					</tbody>
					
				</table>
			</form>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{$total.' '.'vnd'}}</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							 <?php
                                    $customer_id=Session::get('customer_id');
                                    $shipping_id=Session::get('shipping_id');
                                    if($customer_id!=NULL&&$shipping_id==NULL)
                                    {
                                        
                                    ?>    
                                     <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                                      <?php
                                  }elseif($customer_id!=NULL&&$shipping_id!=NULL)
                                  {
                                  	?>
                                  		<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Check Out</a>
                                  	<?php

                                    }else{
                                        ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/login_checkout')}}">Check Out</a>
                                        <?php

                                    }
                                    ?>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection