@extends('layouts.app')
@section('title','ACCEUIL')
@section('content')

<!-- slide-section - start
		================================================== -->
		<section id="slide-section" class="slide-section clearfix">
			<div id="main-carousel1" class="main-carousel1 owl-carousel owl-theme">

				<div class="item" style="background-image: url(assets/images/slider/slider-bg4.jpg);">
					<div class="overlay-black">
						<div class="container">
							<div class="slider-item-content">

								<span class="medium-text">one stop</span>
								<h1 class="big-text">Event Planner</h1>
								<small class="small-text">every event should be perfect</small>

								<div class="link-groups">
									<a href="#" class="about-btn custom-btn">about us</a>
									<a href="#" class="start-btn">get started!</a>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="item" style="background-image: url(assets/images/slider/slider-bg5.jpg);">
					<div class="overlay-black">
						<div class="container">
							<div class="slider-item-content">

								<span class="medium-text">one stop</span>
								<h1 class="big-text">Event Planner</h1>
								<small class="small-text">every event sould be perfect</small>

								<div class="link-groups">
									<a href="#" class="about-btn custom-btn">about us</a>
									<a href="#" class="start-btn">get started!</a>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="item" style="background-image: url(assets/images/slider/slider-bg6.jpg);">
					<div class="overlay-black">
						<div class="container">
							<div class="slider-item-content">

								<span class="medium-text">one stop</span>
								<h1 class="big-text">Event Planner</h1>
								<small class="small-text">every event sould be perfect</small>

								<div class="link-groups">
									<a href="#" class="about-btn custom-btn">about us</a>
									<a href="#" class="start-btn">get started!</a>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- slide-section - end
		================================================== -->





		<!-- upcomming-event-section - start
		================================================== -->
		<section id="upcomming-event-section" class="upcomming-event-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- section-title - start -->
				<div class="section-title text-center mb-50">
					<h2 class="big-title">Nos <strong>Services</strong></h2>
				</div>
				<!-- section-title - end -->

				<!-- upcomming-event-carousel - start -->
				<div id="upcomming-event-carousel" class="upcomming-event-carousel owl-carousel owl-theme">

					@foreach($services as $service)
					<!-- item - start -->
					<div class="item">
						<div class="event-item">

							<div class="event-image">
								<img src="{{asset('/public/assets/images/'. $service->image)}}" alt="Image_not_found">
								
							</div>

							<div class="event-content">
								<div class="event-title mb-30">
									<h3 class="title">
										{{$service['name']}}
									</h3>
									<span class="ticket-price yellow-color">Tickets from {{$service['price']}} DT</span>
								</div>
								<div class="event-post-meta ul-li-block mb-30">
									<ul>
										<li>
											<span class="icon">
												<i class="fas fa-microphone"></i>
											</span>
											{{$service->adress}}
										</li>
										<li>
											<span class="icon">
												<i class="fas fa-ticket-alt"></i>
											</span>
											{{$service->typename}}
										</li>
									</ul>
								</div>
								<a href="{{route('service.show.details',$service->id)}}" class="custom-btn">
									tickets & details
								</a>
							</div>

						</div>
					</div>
					<!-- item - end -->
					@endforeach
					

				</div>
				<!-- upcomming-event-carousel - end -->

			</div>
		</section>
		<!-- upcomming-event-section - end
		================================================== -->





		<!-- about-section - start
		================================================== -->
		<section id="about-section" class="about-section sec-ptb-100 clearfix">
			<div class="container">
				<div class="row">

					<!-- section-title - start -->
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="section-title text-left mb-30">
							<span class="line-style"></span>
							<small class="sub-title">we are La Fiesta</small>
							<h2 class="big-title"><strong>No.1</strong> Events Management</h2>
							<p class="black-color mb-50">
								Lorem ipsum dollor site amet the best  consectuer adipiscing elites sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat insignia the consectuer adipiscing elit. 
							</p>
							<a href="#!" class="custom-btn">
								about La Fiesta
							</a>
						</div>
					</div>
					<!-- section-title - end -->

					<!-- about-item-wrapper - start -->
					<div class="col-lg-8 col-md-12 col-sm-12">
						<div class="about-item-wrapper ul-li">
							<ul>

								<li>
									<a href="#!" class="about-item">
										<span class="icon">
											<i class="flaticon-handshake"></i>
										</span>
										<strong class="title">
											Friendly Team
										</strong>
										<small class="sub-title">
											More than 200 teams
										</small>
									</a>
								</li>
								<li>
									<a href="#!" class="about-item">
										<span class="icon">
											<i class="flaticon-two-balloons"></i>
										</span>
										<strong class="title">
											perfact venues
										</strong>
										<small class="sub-title">
											perfact venues
										</small>
									</a>
								</li>
								<li>
									<a href="#!" class="about-item">
										<span class="icon">
											<i class="flaticon-cheers"></i>
										</span>
										<strong class="title">
											Unique Scenario
										</strong>
										<small class="sub-title">
											We thinking out of the box
										</small>
									</a>
								</li>

								<li>
									<a href="#!" class="about-item">
										<span class="icon">
											<i class="flaticon-clown-hat"></i>
										</span>
										<strong class="title">
											Unforgettable Time
										</strong>
										<small class="sub-title">
											We make you perfect event
										</small>
									</a>
								</li>
								<li>
									<a href="#!" class="about-item">
										<span class="icon">
											<i class="flaticon-speech-bubble"></i>
										</span>
										<strong class="title">
											24/7 Hours Support
										</strong>
										<small class="sub-title">
											Anytime anywhere
										</small>
									</a>
								</li>
								<li>
									<a href="#!" class="about-item">
										<span class="icon">
											<i class="flaticon-light-bulb"></i>
										</span>
										<strong class="title">
											Briliant Idea
										</strong>
										<small class="sub-title">
											We have million idea
										</small>
									</a>
								</li>

							</ul>
						</div>
					</div>
					<!-- about-item-wrapper - end -->
					
				</div>
			</div>
		</section>
		<!-- about-section - end
		================================================== -->


		
		<!-- advertisement-section - start
		================================================== -->
		<section id="advertisement-section" class="advertisement-section clearfix" style="background-image: url(assets/images/special-offer-bg.png);">
			<div class="container">
				<div class="advertisement-content text-center">

					<h2 class="title-large white-color">Are you ready to make <strong>your Own Special Events?</strong></h2>
					<p class="mb-31">“Get started now, La Fiesta event management.”</p>
					<a href="#!" class="purchase-btn">purchase now!</a>
					
				</div>
			</div>
		</section>
		<!-- advertisement-section - end
		================================================== -->


		<!-- event-section - start
		================================================== -->
		<section id="event-section" class="event-section sec-ptb-100 bg-gray-light clearfix">
			<div class="container">

				<div class="mb-50">
					<div class="row">

						<!-- section-title - start -->
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="section-title text-left">
								<span class="line-style"></span>
								<small class="sub-title">La Fiesta Services</small>
								<h2 class="big-title"><strong>Services</strong> listing</h2>
							</div>
						</div>
						<!-- section-title - end -->

						<!-- event-tab-menu - start -->
						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="event-tab-menu clearfix">
								<ul class="nav">
									<li>
										<a data-toggle="tab" href="#tous" class="active show">
											<strong>Tous</strong>
										</a>
									</li>
									@foreach($types as $type)
									<li>
										<a data-toggle="tab" href="#{{$type->typename}}" class="">
											<strong>{{$type->typename}}</strong>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
						<!-- event-tab-menu - end -->

					</div>
				</div>

				<!-- tab-content - start -->
				<div class="tab-content">

					<div id="tous" class="tab-pane fade active show">
						<div class="row">

							@foreach($services as $service)
							<!-- event-item - start -->
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="event-item clearfix">

									<!-- event-image - start -->
									<div class="event-image">
										
										<img src="{{ asset('/public/assets/images/'.$service->image)}}" alt="Image_not_found">
									</div>
									<!-- event-image - end -->

									<!-- event-content - start -->
									<div class="event-content">
										<div class="event-title mb-15">
											<h3 class="title">
												{{$service->name}}
											</h3>
											<span class="ticket-price yellow-color">Tickets from {{$service->price}}DT</span>
										</div>
										<div class="event-post-meta ul-li-block mb-30">
											<ul>
												<li>
													<span class="icon">
														<i class="fas fa-microphone"></i>
													</span>
													{{$service->adress}}
												</li>
												<li>
													<span class="icon">
														<i class="fas fa-ticket-alt"></i>
													</span>
													{{$service->typename}}
												</li>
											</ul>
										</div>
										<a href="{{route('service.show.list')}}" class="tickets-details-btn">
											tickets & details
										</a>
									</div>
									<!-- event-content - end -->

								</div>
							</div>
							<!-- event-item - end -->
							@endforeach
						</div>
					</div>

					@foreach($types as $type)
					<!-- conference-event - start -->
					<div id="{{$type->typename}}" class="tab-pane fade">
						<div class="row">

							@foreach($services as $service)
							@if($service->typename == $type->typename)
							<!-- event-item - start -->
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="event-item clearfix">

									<!-- event-image - start -->
									<div class="event-image">
										
										<img src="{{ asset('/public/assets/images/'.$service->image)}}" alt="Image_not_found">
									</div>
									<!-- event-image - end -->

									<!-- event-content - start -->
									<div class="event-content">
										<div class="event-title mb-15">
											<h3 class="title">
												{{$service->name}}
											</h3>
											<span class="ticket-price yellow-color">Tickets from {{$service->price}}DT</span>
										</div>
										<div class="event-post-meta ul-li-block mb-30">
											<ul>
												<li>
													<span class="icon">
														<i class="fas fa-microphone"></i>
													</span>
													{{$service->adress}}
												</li>
												<li>
													<span class="icon">
														<i class="fas fa-ticket-alt"></i>
													</span>
													{{$service->typename}}
												</li>
											</ul>
										</div>
										<a href="{{route('service.show.list')}}" class="tickets-details-btn">
											tickets & details
										</a>
									</div>
									<!-- event-content - end -->

								</div>
							</div>
							<!-- event-item - end -->
							@endif
							@endforeach
						</div>
					</div>
					<!-- conference-event - end -->
					@endforeach
				</div>
				<!-- tab-content - end -->

			</div>
		</section>
		<!-- event-section - end
		================================================== -->

		<!-- event-gallery-section - start
		================================================== -->
		<section id="event-gallery-section" class="event-gallery-section sec-ptb-100 clearfix" style="padding-bottom: 0px!important">

			<!-- section-title - start -->
			<div class="section-title text-center mb-50">
				<small class="sub-title">La Fiesta gallery</small>
				<h2 class="big-title">Beautiful & <strong>Unforgettable Times</strong></h2>
			</div>
			<!-- section-title - end -->

			<div class="button-group filters-button-group mb-30">
				<button class="button is-checked" data-filter="*">
					<i class="fas fa-star"></i>
					<strong>all</strong> gallery
				</button>
				<button class="button" data-filter=".video-gallery">
					<i class="fas fa-play-circle"></i>
					<strong>video</strong> gallery
				</button>
				<button class="button" data-filter=".photo-gallery">
					<i class="far fa-image"></i>
					<strong>photo</strong> gallery
				</button>
			</div>

			<div class="grid zoom-gallery clearfix" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">
				<div class="grid-item grid-item--height2 photo-gallery " data-category="photo-gallery">
					<a class="popup-link" href="assets/images/gallery/1.image.jpg">
						<img src="assets/images/gallery/1.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>John Doe Wedding day</h3>
						<span>Wedding Party, 24 June 2016</span>
					</div>
				</div>
				<div class="grid-item grid-item--width2 video-gallery " data-category="video-gallery">
					<a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
						<img src="assets/images/gallery/2.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>Business Conference in Dubai</h3>
						<span>Food Festival, 24 June 2016</span>
					</div>
				</div>
				<div class="grid-item photo-gallery " data-category="photo-gallery">
					<a class="popup-link" href="assets/images/gallery/3.image.jpg">
						<img src="assets/images/gallery/3.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>Envato Author Fun Hiking</h3>
						<span>Food Festival, 24 June 2016</span>
					</div>
				</div>

				<div class="grid-item photo-gallery " data-category="photo-gallery">
					<a class="popup-link" href="assets/images/gallery/4.image.jpg">
						<img src="assets/images/gallery/4.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>John Doe Wedding day</h3>
						<span>Wedding Party, 24 June 2016</span>
					</div>
				</div>
				<div class="grid-item grid-item--width2 video-gallery " data-category="video-gallery">
					<a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
						<img src="assets/images/gallery/5.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>New Year Celebration</h3>
						<span>Food Festival, 24 June 2016</span>
					</div>
				</div>

				<div class="grid-item grid-item--width2 photo-gallery " data-category="photo-gallery">
					<a class="popup-link" href="assets/images/gallery/6.image.jpg">
						<img src="assets/images/gallery/6.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>John Doe Wedding day</h3>
						<span>Wedding Party, 24 June 2016</span>
					</div>
				</div>
				<div class="grid-item video-gallery " data-category="video-gallery">
					<a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
						<img src="assets/images/gallery/7.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>New Year Celebration</h3>
						<span>Food Festival, 24 June 2016</span>
					</div>
				</div>
				<div class="grid-item photo-gallery " data-category="photo-gallery">
					<a class="popup-link" href="assets/images/gallery/8.image.jpg">
						<img src="assets/images/gallery/8.image.jpg" alt="Image_not_found">
					</a>
					<div class="item-content">
						<h3>Envato Author Fun Hiking</h3>
						<span>Food Festival, 24 June 2016</span>
					</div>
				</div>
			</div>

		</section>
		<!-- event-gallery-section - end
		================================================== -->





		<!-- event-expertise-section - start
		================================================== -->
		<section id="event-expertise-section" class="event-expertise-section bg-gray-light sec-ptb-100 clearfix">
			<div class="container">

				<!-- section-title - start -->
				<div class="section-title text-center mb-50">
					<small class="sub-title">Nos packs</small>
					<h2 class="big-title">La Fiesta <strong>Packs</strong></h2>
				</div>
				<!-- section-title - end -->

				<!-- event-expertise-carousel - start -->
				<div id="event-expertise-carousel" class="event-expertise-carousel owl-carousel owl-theme">

					@foreach($packs as $pack)
					<!-- expertise-item - start -->
					<div class="item pt-4 tab-nav2" style="background-color: white;height:380px; overflow-y: scroll;">
						<div class="tab-menu">
							<small>Packs des services</small>
							<h3 style="line-height: 5px!important"><strong>{{$pack->name}}</strong> <br> <small class="pb-3" style="font-size: 12px">Remise de <strong>{{$pack->remise}}%</strong> sur le totale</small>
							</h3>
							
							<ul class="nav tab-nav mb-30">

								@foreach($pack->services as $service)
								<li class="nav-item">
									<a class="nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one" aria-expanded="true">

										<span class="image" >
											<img style="width:30%;float: left" src="{{asset('/public/assets/images/'. $service->image)}}" alt="Image_not_found">
									
									
											<span class="title ml-4" style="color: black">
												<strong> {{$service->name}} </strong>
											</span><br>
	
											<small class="price ml-4 pt-0" style="color: black"> <strong class="mt-2"> {{$service->price}}DT </strong> <br>  {{$service->adress }}</small>
										</span>
									
									</a>
								</li>
								@endforeach
							
							</ul>

						</div>
					</div>
					@endforeach
					<!-- expertise-item - end -->
				</div>
				<!-- event-expertise-carousel - end -->

			</div>
		</section>
		<!-- event-expertise-section - end
		================================================== -->



		<!-- partners-clients-section - start
		================================================== 
		<section id="partners-clients-section" class="partners-clients-section bg-gray-light sec-ptb-100 clearfix" style="background-color:#dddddd;">
			<div class="container">

				<div class="section-title text-center mb-50">
					<small class="sub-title">we are La Fiesta</small>
					<h2 class="big-title">We have <strong>Best Partners & Clients</strong></h2>
					<p class="m-0 black-color">
						Lorem ipsum dollor site amet the best  consectuer adipiscing elites sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat insignia the consectuer adipiscing elit. 
					</p>
				</div>

				<div class="row">

					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="partners-wrapper">
							<span class="carousel-title">
								La Fiesta <strong>sponsors</strong>
							</span>
							<div id="partners-carousel" class="partners-carousel owl-carousel owl-theme">

								<div class="item">
									<ul>

										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>

									</ul>
								</div>

								<div class="item">
									<ul>

										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>

									</ul>
								</div>

								<div class="item">
									<ul>

										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>
										<li>
											<a href="#!">
												<img src="assets/images/partners/image1.png" alt="Image_not_found">
											</a>
										</li>

									</ul>
								</div>

							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="clients-testimonial" style="background-image: url(assets/images/1.testimonial-bg.jpg);">
							<div class="overlay-black">

								<div class="section-title text-center mb-50">
									<small class="sub-title">testimonial</small>
									<h2 class="big-title">client <strong>says</strong></h2>
								</div>

								<div id="clients-testimonial-carousel" class="clients-testimonial-carousel owl-carousel owl-theme">
									<div class="item text-center">
										<p class="mb-30">
											“Bring people together, or turn your passion into a business. La Fiesta gives you everything you need to host your best event yet. lorem ipsum diamet adispiscing dispend.”
										</p>
										<div class="client-info">
											<h3 class="client-name">Jenni Hernandes</h3>
											<span class="client-sub-title">Graphic Designer</span>
										</div>
									</div>

									<div class="item text-center">
										<p class="mb-30">
											“Bring people together, or turn your passion into a business. La Fiesta gives you everything you need to host your best event yet. lorem ipsum diamet adispiscing dispend.”
										</p>
										<div class="client-info">
											<h3 class="client-name">Jenni Hernandes</h3>
											<span class="client-sub-title">Graphic Designer</span>
										</div>
									</div>

									<div class="item text-center">
										<p class="mb-30">
											“Bring people together, or turn your passion into a business. La Fiesta gives you everything you need to host your best event yet. lorem ipsum diamet adispiscing dispend.”
										</p>
										<div class="client-info">
											<h3 class="client-name">Jenni Hernandes</h3>
											<span class="client-sub-title">Graphic Designer</span>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					
				</div>

			</div>
		</section>
		 partners-clients-section - end
		================================================== -->

@endsection