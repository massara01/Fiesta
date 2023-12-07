@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jthemes.net/themes/html/harmony-event/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Apr 2021 16:34:50 GMT -->
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Fiesta - Temoignage Service </title>
	<link rel="shortcut icon" href="assets/images/favicon.png">

	<!-- fraimwork - css include -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<!-- icon css include -->
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

	<!-- carousel css include -->
	<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
	<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

	<!-- others css include -->
	<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/calendar.css">

	<!-- color switcher css include -->
	<link rel="stylesheet" type="text/css" href="assets/css/colors/style-switcher.css">
	<link id="color_theme" rel="stylesheet" type="text/css" href="assets/css/colors/default.css">

	<!-- custom css include -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>


<body class="default-header-p">

	<!-- backtotop - start -->
	<div id="thetop" class="thetop"></div>
	<div class='backtotop'>
		<a href="#thetop" class='scroll'>
			<i class="fas fa-angle-double-up"></i>
		</a>
	</div>
	<!-- backtotop - end -->

		<!-- event-details-section - start
			================================================== -->
			<section id="event-details-section" class="event-details-section sec-ptb-100 clearfix">
				<div class="container">
					<div class="row">

						<!-- col - event-details - start -->
						<div class="col-lg-8 col-md-12 col-sm-12">
							<!-- reviewer-comment-wrapper - start -->
							<div class="reviewer-comment-wrapper mb-30 clearfix">

								<div class="section-title text-left mb-50">
									<h2 class="big-title">Temoignage des <strong>Clients</strong></h2>
								</div>
								@if ($Ltemoignages->count()==0)
									<p> aucun Temoignage trouvé !! Merci d'ajouter le votre :) </p>
								@endif
								@foreach($Ltemoignages as $tem)
								<div class="comment-bar clearfix">
									<div class="admin-image">
										<img src="{{ asset('assets/images/profil.png') }}" alt="Image_not_found">
									</div>
									<div class="comment-content">
										<div class="admin-name mb-15">
										
											<div class="name">
												<a href="#!">{{$tem['userName']}}</a>
											</div>
										</div>
										<div class="comment-text">
											<p class="mb-30">
											{{$tem['contenu']}}
											</p>
										</div>
									</div>
								</div>
								@endforeach
								{{$Ltemoignages->links() }}

							</div>
							<!-- reviewer-comment-wrapper - end -->

							


							<!-- comment-form - start -->
							<div class="comment-form clearfix">

								<div class="section-title text-left mb-50">
									<h2 class="big-title">Ajouter votre <strong>avis</strong></h2>
								</div>

								<div class="form-wrapper">
									<form action="addTemoignage/{{$id}}" method="POST" enctype="multipart/form-data">
									@csrf
										<div class="row">

											<!-- form-item - start -->
											<div class="col-lg-4 col-md-6 col-sm-12">
												<div class="form-item mb-30">
													<input type="text" name="userName" placeholder="Your Name" required>
												</div>
											</div>
											<!-- form-item - end -->

											<!-- form-item - start -->
											<div class="col-lg-4 col-md-6 col-sm-12">
												<div class="form-item mb-30">
													<input type="email" name="userEmail" placeholder="Your Email Address" required>
												</div>
											</div>
											<!-- form-item - end -->

											<!-- form-item - start -->
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="mb-30">
													<textarea name="contenu" placeholder="Your Comment" required></textarea>
												</div>
												<button type="submit" class="custom-btn">Envoyer</button>
											</div>
											<!-- form-item - end -->

										</div>
									</form>
								</div>

							</div>
							<!-- comment-form - end -->

						</div>
						<!-- col - event-details - end -->
					</div>
				</div>
			</section>
		<!-- event-details-section - end
			================================================== -->





	

			<!-- fraimwork - jquery include -->
			<script src="assets/js/jquery-3.3.1.min.js"></script>
			<script src="assets/js/popper.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>

			<!-- carousel jquery include -->
			<script src="assets/js/slick.min.js"></script>
			<script src="assets/js/owl.carousel.min.js"></script>

			<!-- map jquery include -->
			<script src="assets/js/gmap3.min.js"></script>
			<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

			<!-- calendar jquery include -->
			<script src="assets/js/atc.min.js"></script>

			<!-- others jquery include -->
			<script src="assets/js/jquery.magnific-popup.min.js"></script>
			<script src="assets/js/isotope.pkgd.min.js"></script>
			<script src="assets/js/jarallax.min.js"></script>
			<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

			<!-- gallery img loaded - jqury include -->
			<script src="assets/js/imagesloaded.pkgd.min.js"></script>

			<!-- multy count down - jqury include -->
			<script src="assets/js/jquery.countdown.js"></script>

			<!-- color panal - jqury include -->
			<script src="assets/js/style-switcher.js"></script>

			<!-- custom jquery include -->
			<script src="assets/js/custom.js"></script>





		</body>
		
<!-- Mirrored from jthemes.net/themes/html/harmony-event/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Apr 2021 16:34:50 GMT -->
</html>