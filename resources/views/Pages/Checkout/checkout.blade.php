@extends('welcome')
@section('content')

<!--
	---Modal Payment
!-->
<div class="modal fade" id="Quick_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Billing Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-bill" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary send_data">Order</button>
      </div>
    </div>
  </div>
</div>











	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{URL::to('/save_checkout_customer')}}" method="POST">
									{{csrf_field()}}
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Email*">
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Name *">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Address *">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Phone">
									<textarea name="shipping_note" class="shipping_note" placeholder="Notes about your order" 
									rows="5"></textarea>
									@if(Session::get('fee'))
									
									@endif
										<div class="form-group">
                                    		<label for="exampleInputFile">Choose a payment method</label>
                                  			 <select name="payment_select" id="shipping_method" class="form-control input-sm m-bot15 payment_select">
                                        <option value="0">Paypal</option>
                                        <option value="1">Payment on delivery</option>
                                    </select>
                                </div>
                                <div class="paypal-button" id="paypal-button"></div>
									<input type="button" style="display: none;" value="Send" name="btn_send_order" class="btn btn-primary btn-sm btn_send">
								</form>
								  <form>
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose a City</label>
                                   <select name="City" id="city" class="form-control input-sm m-bot15 choose city">
                                        <option value="">Choose a city</option>
                                        @foreach($city as $key=>$ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose a Province</label>
                                   <select name="Province" id="province" class="form-control input-sm m-bot15 province choose">
                                        <option value="">Choose a Province</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose a Ward</label>
                                   <select name="Ward" id="wards" class="form-control input-sm m-bot15 wards">
                                         <option value="">Choose a Ward</option>
                                    </select>
                                </div>
                                
                                <input type="button" value="Feeship" name="btn_send_feeship" class="btn btn-primary btn-sm caculate_delivery">
                            </form>
                           	

							</div>
							
						</div>
					</div>
									
				</div>
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
						<td><li>Price <span>{{$total.' '.'vnd'}}</span></li>
						<div id="tienship"></div>
						<!-- <li>Fee ship <span>{{number_format(Session::get('fee'),0,',','.')}}</span></li> -->
						</li></td>
					</td>
					<input type="hidden" id="VNDUSD" name="VND" value="{{round(($total+Session::get('fee'))/23000,2)}}">
						<tr><td><input type="submit" value="Update" name="btn_update" class="btn btn-default btn-sm check_out"></td></tr>
					</tbody> 
				</table>
			</form>
			</div>		
		</div>
	</section> <!--/#cart_items-->

@endsection