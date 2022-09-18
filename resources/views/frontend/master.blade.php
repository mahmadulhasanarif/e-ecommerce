<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Laravel E-Commerce Website</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>

    </head>
	<body>
		<!-- HEADER -->
		<header>
            @include('frontend.layout.header')
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			@include('frontend.layout.nav')
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
            @yield('content')
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
            @include('frontend.layout.search')
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
            @include('frontend.layout.footer')
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
		<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
		<script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('frontend/js/main.js') }}"></script>

	</body>
</html>
