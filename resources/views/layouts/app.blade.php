<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="#">
	
	<title>FIESTA | @yield('title')</title>
	<meta property="og:title" content="@yield('title_link')">
	<meta property="og:image" content="@yield('image')"></head>

	<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- fraimwork - css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

	<!-- icon css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome-all.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flaticon.css')}}">

	<!-- carousel css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.min.css')}}">

	<!-- others css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/calendar.css')}}">

	<!-- color switcher css include -->
	<link id="color_theme" rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/default.css')}}">

	<!-- custom css include -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

<body>


	@include('front.includes.header')

	@yield('content')

	@include('front.includes.footer')

	
	<!-- fraimwork - jquery include -->
	<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

	<!-- carousel jquery include -->
	<script src="{{asset('assets/js/slick.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

	<!-- map jquery include -->
	<script src="{{asset('assets/js/gmap3.min.js')}}"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

	<!-- calendar jquery include -->
	<script src="{{asset('assets/js/atc.min.js')}}"></script>

	<!-- others jquery include -->
	<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('assets/js/jarallax.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

	<!-- multy count down - jqury include -->
	<script src="{{asset('assets/js/jquery.countdown.js')}}"></script>


	<!-- custom jquery include -->
	<script src="{{asset('assets/js/custom.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>


	@yield('script')


</body>

</html>
