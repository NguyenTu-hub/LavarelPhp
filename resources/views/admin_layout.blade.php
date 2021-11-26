<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/backend/images/2.png')}}">
                <span class="username">
                	<?php
                	$Name=Session::get('admin_name');
                	echo $Name;
                	?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Order</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage_order')}}">Order Management</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Category Product</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/addCategory')}}">Add Category Product</a></li>
						<li><a href="{{URL::to('/listCategory')}}">Listed Category Product</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Brand Product</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/addBrand')}}">Add Brand Product</a></li>
						<li><a href="{{URL::to('/listBrand')}}">Listed Brand Product</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Delivery code</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/delivery')}}">Delivery</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Product</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/addProduct')}}">Add Product</a></li>
						<li><a href="{{URL::to('/listProduct')}}">Listed Product</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Statitical</span>
                    </a>
                     <ul class="sub">
						<li><a href="{{URL::to('/Statitical')}}">Add Product</a></li>
					</ul>
                </li>
            </ul>            </div>

        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	   @yield('admin_content')	
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		fetch_delivery();
		function fetch_delivery()
		{
			var _token=$('input[name="_token"]').val();
			$.ajax({
				url:'{{url('/select_feeship')}}',
				method:'POST',
				data:{_token:_token},
				success:function(data){
					$('#load_delivery').html(data);
				}
			})
		}
		$(document).on('blur','.feeship_edit',function(){
			var feeship_id=$(this).data('feeship_id');
			var value=$(this).text();
			var _token=$('input[name="_token"]').val();
			$.ajax({
				url:'{{url('/update-delivery')}}',
				method:'POST',
				data:{feeship_id:feeship_id,value:value,_token:_token},
				success:function(data){
					fetch_delivery();
				}
			})
		})
		$('.btn_delivery').click(function(){
			var city=$('.city').val();
			var province=$('.province').val();
			var wards=$('.wards').val();
			var feeship=$('.feeship').val();
			var _token=$('input[name="_token"]').val();
			$.ajax({
				url:'{{url('/insert-delivery')}}',
				method:'POST',
				data:{city:city,province:province,wards:wards,feeship:feeship,_token:_token},
				success:function(data){
					alert('Insert Successfully');
					fetch_delivery();
				}
			})
		})
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
				url:'{{url('/select-delivery')}}',
				method:'POST',
				data:{action:action,matp:matp,_token:_token},
				success:function(data){
					$('#'+result).html(data);
				}
			})
		});
	})

</script>
<script type="text/javascript">
	CKEDITOR.replace('ckeditor');
	CKEDITOR.replace('ckeditor1')
</script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	

<!-- calendar -->
	
	<!-- //calendar -->
	<script>
 		$( function() {
   		 $( "#datepicker" ).datepicker();
  			

  			} );

 		$( function() {
   		 $( "#datepicker2" ).datepicker();
  			

  		} );
  </script>
   <script type="text/javascript">
  	$(document).ready(function()
  	{
  		var chart = new Morris.Line({
 		 element: 'thongke',
 		 lineColors:['#4ca3dd','#ffffff'],
 		 labelColor: '#000',
 		 parseTime:false,
  		xkey: 'Times',
  		ykeys: ['total'],
  		labels:['total']	
		});


		$('#filter').click(function()
  	{
  		var from_date=$('#datepicker').val();
  		var to_date=$('#datepicker2').val();
  		var _token=$('input[name="_token"]').val();
  		$.ajax({
				url:'{{url('/filter-statitical')}}',
				method:'POST',
				dataType:"JSON",
				data:{from_date:from_date,to_date:to_date,_token:_token},

				success:function(data){
					chart.setData(data);
				}
			});
  	});
  	});
  </script>
</body>
</html>
