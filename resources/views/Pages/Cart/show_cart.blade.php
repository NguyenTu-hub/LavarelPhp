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
			<div class="table-responsive cart_info">
				<?php
					$content= Cart::content();
					
				?>
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
						@foreach($content as $value)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/upload/products/'.$value->options->image)}}" width="30" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$value->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($value->price)}}</p>
							</td>
							<td class="cart_quantity">
								<form action="{{URL::to('/update_cart')}}" method="POST">
									{{ csrf_field() }}
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$value->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$value->rowId}}">
									<input type="submit" value="Update" name="btn_update" class="btn btn-default btn-sm">
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$subtotal= $value->price* $value->qty;
									echo number_format($subtotal).' '.'vnd'

								?>
									
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete_card/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::total().' '.'vnd'}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total().' '.'vnd'}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection