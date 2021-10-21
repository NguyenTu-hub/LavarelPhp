@extends('welcome')
@section('content')


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Payment</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="shopper-informations">
				<div class="row">
					
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
			<h4 style="margin: 40px 0;font-size: 20px;">Choose a payment option</h4>
			<form method="POST" action="{{URL::to('/order_place')}}">
				{{csrf_field()}}
				<div class="payment-options">
					<span>
						<label><input name="payment_options" value="1" type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input name="payment_options" value="2" type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input name="payment_options" value="3" type="checkbox"> Paypal</label>
					</span>
					<input type="submit" value="Send" name="send_order_place" class="btn btn-primary btn-sm">
				</div>

			</form>
			
		</div>
	</section> <!--/#cart_items-->

@endsection