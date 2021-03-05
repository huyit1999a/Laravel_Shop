<!DOCTYPE html>
<head>
	<title>Trang quản lý Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
	<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
	<div class="log-w3">
	<div class="main">
		<h2>Đăng nhập</h2>
		<?php 
			$message = Session::get('message');
			if($message){
				echo '<span class="text-alert">'.$message.'</span>';
				Session::put('message',null);
			}
		?>
			<form action="{{URL::to('/admin-dashboard')}}" method="post">
				{{ csrf_field() }}
				<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
				<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">	
			</form>
			<!-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> -->
	</div>
	</div>

	<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
	<script src="{{asset('public/backend/js/scripts.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>

</body>
</html>
