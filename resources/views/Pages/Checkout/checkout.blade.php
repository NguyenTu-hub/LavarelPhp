@extends('welcome')
@section('content')


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
									<input type="text" name="shipping_email" placeholder="Email*">
									<input type="text" name="shipping_name" placeholder="Name *">
									<input type="text" name="shipping_address" placeholder="Address *">
									<input type="text" name="shipping_phone" placeholder="Phone">
									<textarea name="shipping_note"  placeholder="Notes about your order" rows="16"></textarea>
									<input type="submit" value="Send" name="btn_send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
		</div>
	</section> <!--/#cart_items-->

@endsection