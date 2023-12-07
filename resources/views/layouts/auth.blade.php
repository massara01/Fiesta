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

		<!-- fraimwork - css include -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

		<!-- icon css include -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome-all.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flaticon.css')}}">

		
		<!-- color switcher css include -->
		<link id="color_theme" rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/default.css')}}">

		<!-- custom css include -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/authstyle.css')}}">

<body>



	@yield('content')


	
	<!-- fraimwork - jquery include -->
	<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

	<!-- custom jquery include -->
	<script src="{{asset('assets/js/custom.js')}}"></script>


	@yield('script')


</body>

</html>
