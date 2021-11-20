<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-watch</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="{{('public/frontend/images/logo.jpg')}}" width="70" height="70" alt="" />E_WATCHSHOP</a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    VietNam
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USA</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    VND
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"> Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                 <?php
                                    $customer_id=Session::get('customer_id');
                                    $shipping_id=Session::get('shipping_id');
                                    if($customer_id!=NULL&&$shipping_id==NULL)
                                    {
                                        
                                    ?>  
                                     <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                      <?php
                                  }
                                    elseif($customer_id!=NULL&&$shipping_id!=NULL)
                                    {
                                        ?>
                                        <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <?php
                                    }else{
                                        ?>
                                        <li><a href="{{URL::to('/login_checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                        <?php

                                    }
                                    ?>
                           
                                <li><a href="{{URL::to('/show_cart_ajax')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php
                                    $customer_id=Session::get('customer_id');
                                    if($customer_id!=NULL)
                                    {
                                        
                                    ?>  
                                      <li><a href="{{URL::to('/logout_checkout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                                      <?php
                                    }else{
                                        ?>
                                        <li><a href="{{URL::to('/login_checkout')}}"><i class="fa fa-lock"></i> Login</a></li>
                                        <?php

                                    }
                                    ?>
                                
                               
                                 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/home')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                </li> 
                                <li><a href="{{URL::to('/show_cart')}}">Cart</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                         <form action="{{URL::to('/search_product')}}" autocomplete="off" method="POST">
                            {{csrf_field()}}
                            <div class="search_box">
                            <input type="text" style="width: 70%;" name="keyword_submit" id="keyword" placeholder="Search"/>
                            <div id="search_ajax"></div>
                            <input type="submit" style="margin-top: 0px; color: black;" class="btn btn-primary btn-sm" name="search_item" value="Search">
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-WATCHER</h1>
                                    <h2>Free ship</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/frontend/images/watch1.jpg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                     <h1><span>E</span>-WATCHER</h1>
                                    <h2>Free ship</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/frontend/images/watch2.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-WATCHER</h1>
                                    <h2>Free ship</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/frontend/images/watch3.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key=>$cate)
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/category/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div><!--/category-products-->
                        
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            @foreach($Brand as $key=>$brand)
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('/brand/'.$brand->Brand_id)}}"> <span class="pull-right"></span>{{$brand->Brand_name}}</a></li>
                                </ul>
                            </div>
                            @endforeach
                        </div><!--/brands_products-->   
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right"> <!feature-item cut>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-watcher</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('public/frontend/images/aloha1.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('public/frontend/images/aloha2.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('public/frontend/images/aloha3.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('public/frontend/images/aloha4.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{URL::to('/public/frontend/images/map.png')}}" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Watch shop Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Female</a></li>
                                <li><a href="#">Male</a></li>
                                <li><a href="#">Rolex</a></li>
                                <li><a href="#">Chanel</a></li>
                                <li><a href="#">...</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-Watcher Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script >
    var usd=document.getElementById("VNDUSD").value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AZaiSwlbeFhxo6qlQpBSSEkMgtHXJnzsR7a1uyvHB3p4CrmKa6dBoBrghxkv02TQJkfoaOpPvez5j5cH',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
         var shipping_email=$('.shipping_email').val();
            var shipping_name=$('.shipping_name').val();
            var shipping_address=$('.shipping_address').val();
            var shipping_phone=$('.shipping_phone').val();
            var shipping_note=$('.shipping_note').val();
            var shipping_method=$('.payment_select').val();
            var order_fee=$('.order_fee').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url: '{{url('/confirm_order')}}',
                    method: 'POST',
                    data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_note:shipping_note,shipping_method:shipping_method,order_fee:order_fee,_token:_token},
                    success:function(){
                              swal("Thanks your purchase", {
                        icon: "success",
                     });
                                setTimeout(function(){

                            window.location.href="/watchshoplaravel/";
                        }, 500);
                    }

            });
        // window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

 
</script>
<script type="text/javascript">
     $('#keyword').keyup(function()
  {
    var query=$(this).val();
    if(query!='')
    {  
        var _token=$('input[name="_token"]').val();
        $.ajax({
            url:'{{url('/auto_complete-ajax')}}',
            method:"POST",
            data:{query:query,_token:_token},
            success:function(data){
                $('#search_ajax').fadeIn();
                 $('#search_ajax').html(data);


            }

        });
    }else{
        $('#search_ajax').fadeOut();
    }
  });
     $(document).on('click','.li_search_ajax',function(){
        $('#keyword').val($(this).text());
        $('#search_ajax').fadeOut();
     });

    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action=$(this).attr('id');
            var matp=$(this).val();
            var _token=$('input[name="_token"]').val();
            var result='';
            // alert(action);
            // alert(matp);
            // alert(_token);
            if(action=='city'){
                result='province';
            }else{
                result='wards';
            }
            $.ajax({
                url:'{{url('/select_delivery_home')}}',
                method:'POST',
                data:{action:action,matp:matp,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            })
        });
        $('.add-to-cart').click(function(){
            var id=$(this).data('id');
            var cart_product_id=$('.cart_product_id_'+id).val();
            var cart_product_name=$('.cart_product_name_'+id).val();
            var cart_product_image=$('.cart_product_image_'+id).val();
            var cart_product_price=$('.cart_product_price_'+id).val();
            var cart_product_qty=$('.cart_product_qty_'+id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(data){
                              swal("Product added to cart!", "Thank You!", "success");
                    }

            });

            
        })
    });

</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.caculate_delivery').click(function()
        {
            var matp=$('.city').val();
            var maqh=$('.province').val();
            var xaid=$('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp=='' || maqh==''||xaid=='')
            {
                swal("Please choose three options to delivery");
            }
            else{
            $.ajax({
                url:'{{url('/caculate_fee')}}',
                method:'POST',
                data:{maqh:maqh,matp:matp,xaid:xaid,_token:_token},
                success:function(){
                    location.reload()
                }
            })
        }
        });
    });
</script>
<script type="text/javascript">
     $('.btn_send').click(function(){
          
            var shipping_email=$('.shipping_email').val();
            var shipping_name=$('.shipping_name').val();
            var shipping_address=$('.shipping_address').val();
            var shipping_phone=$('.shipping_phone').val();
            var shipping_note=$('.shipping_note').val();
            var shipping_method=$('.payment_select').val();
            var order_fee=$('.order_fee').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url: '{{url('/show_order')}}',
                    method: 'POST',
                    data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_note:shipping_note,shipping_method:shipping_method,order_fee:order_fee,_token:_token},
                    success:function(data){
                               $('.modal-body').html(data);
                                $('#Quick_payment').modal();

                            
                    }

            });
            
        })
</script>
<script type="text/javascript">
    $('.send_data').click(function()
    {
     swal({
  title: "Are you sure?",
  text: "Once you place an order you cannot refund the transaction",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

            var shipping_email=$('.shipping_email').val();
            var shipping_name=$('.shipping_name').val();
            var shipping_address=$('.shipping_address1').val();
            var shipping_phone=$('.shipping_phone').val();
            var shipping_note=$('.shipping_note').val();
            var shipping_method=$('.payment_select').val();
            var order_fee=$('.order_fee').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url: '{{url('/confirm_order')}}',
                    method: 'POST',
                    data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_note:shipping_note,shipping_method:shipping_method,order_fee:order_fee,_token:_token},
                    success:function(){
                        swal("Thanks your purchase", {
                        icon: "success",
                     });
                         
                        setTimeout(function(){

                            window.location.href="/watchshoplaravel/";
                        }, 500);  
                    }

            });
  } else {
    swal("Please comlete your order!");
  }
});   
    })
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.payment_select').on('change',function()
        {
            var value=$(this).val();
            if(value==1)
            {
                $('.paypal-button').css('display','none');
            }
            else
            {
                $('.paypal-button').show();
            }
        })
    })
</script>
</body>
</html>