<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CSR Limited</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/bootstrap.min.css') }}">
		<!-- Font awesome CSS -->
		<!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/font-awesome.min.css') }}">
		<!-- Custom CSS -->
		<!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/style.css') }}">
		<script type="text/javascript" src="{{ asset('web_assets/js/jquery.js') }}"></script>

		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>

	<body>

		<div class="wrapper">

			<!-- header -->
			<header>
				<!-- navigation -->
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="{{ url('/') }}"><img class="img-responsive" src="{{ asset('images/csr-limited.png') }}" alt="Logo" /></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a style="font-size: 16px; font-weight: 600;" href="{{ url('/') }}">Home</a></li>
								<li><a style="font-size: 16px; font-weight: 600;" href="#team">About Us</a></li>
								<li><a style="font-size: 16px; font-weight: 600;" href="#contact">Contact Us</a></li>
								<li><a style="font-size: 16px; font-weight: 600;" href="{{ url('all_reviews') }}">All Reviews</a></li>
								<li><a style="font-size: 14px; font-weight: 600; color: #fb6c6c; margin-left: 100px;" href="{{ url('/login') }}/admin"><i class="fa fa-sign-in" style="color: #fb6c6c;" aria-hidden="true"></i> Site Administrator</a></li>
								<li><a style="font-size: 14px; font-weight: 600; color: #fb6c6c; margin-left: 10px;" href="{{ url('/login') }}/user"><i class="fa fa-sign-in" style="color: #fb6c6c;" aria-hidden="true"></i> CSR Staff</a></li>
								<li><a style="font-size: 14px; font-weight: 600; color: #fb6c6c; margin-left: 10px;" href="{{ url('/login') }}/owner"><i class="fa fa-sign-in" style="color: #fb6c6c;" aria-hidden="true"></i> Shop Owner</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</header>
