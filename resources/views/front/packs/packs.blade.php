@extends('layouts.app')
@section('title','MES SERVICES')
@section('content')

    <style>
        .sticky-header-section{
            background-color:#333333!important
        }
        .default-header-p {
            padding-top: 110px!important;
        }
    </style>


		<!-- breadcrumb-section - start
		================================================== -->
		<section id="breadcrumb-section" class="breadcrumb-section clearfix" style="padding-top: 110px">
			<div class="jarallax" style="background-image: url({{asset('/assets/images//breadcrumb/0.breadcrumb-bg.jpg')}});">
				<div class="overlay-black">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-6 col-md-12 col-sm-12">

								<!-- breadcrumb-title - start -->
								<div class="breadcrumb-title text-center mb-50">
									<span class="sub-title">what we can do</span>
									<h2 class="big-title">Fiesta <strong>Packs</strong></h2>
								</div>
								<!-- breadcrumb-title - end -->

								<!-- breadcrumb-list - start -->
								<div class="breadcrumb-list">
									<ul>
										<li class="breadcrumb-item"><a href="index-1.html" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item"><a href="#!" class="breadcrumb-link">About</a></li>
										<li class="breadcrumb-item active" aria-current="page">packs</li>
									</ul>
								</div>
								<!-- breadcrumb-list - end -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- breadcrumb-section - end
		================================================== -->

        	<!-- conference-section - start
		================================================== -->
		<section id="conference-section" class="conference-section clearfix" style="background-color: white!important">
            <div class="sec-ptb-100">

                @foreach($packs as $pack)
                <!-- conference-content-wrapper - start -->
                <div class="tab-wrapper">

                    <!-- tab-menu - start -->
                    <div class="container">
                        <div class="row justify-content-lg-start">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="tab-menu">
                                    <ul class="nav tab-nav mb-50">
                                        @foreach($pack->services as $service)
                                        <li class="nav-item">
                                            <a class="nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one" aria-expanded="true">

                                                <span class="image">
                                                    <img src="{{asset('/public/assets/images/'. $service->image)}}" alt="Image_not_found">
                                                </span>

                                                <span class="title" style="color: black">
                                                    <strong> {{$service->name}} </strong>
                                                </span>

                                                <small class="price pt-2" style="color: black">{{$service->price}}DT</small>
                                                <small class="sub-title" style="color: black">{{$service->adress }}</small>
                                            </a>
                                        </li>
                                        @endforeach
                                    
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab-menu - end -->

                    <!-- tab-content - start -->
                    <div class="tab-content">

                        <!-- tab-pane - start -->
                        <div class="tab-pane fade active show" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab" style="background-color: transparent" aria-expanded="true">
                            <div class="event-content">

								<!-- event-title - start -->
								<div class="event-title">
								
									<h3 class="title-text"> <strong>{{$pack->name}}</strong></h3>
									<span class="sub-title">Remise jusqu'à <strong>{{$pack->remise}}%</strong></span>
								</div>
								<!-- event-title - end -->

								<p class="black-color mt-4 mb-4">
                                    {{$pack->description}}
								</p>

							
								<div class="text-left mt-4">
									<a href="{{route('cart.add.pack',$pack->idAb)}}" class="custom-btn">Ajouter au panier</a>
								</div>

							</div>
                        </div>
                        <!-- tab-pane - end -->

                    </div>
                    <!-- tab-content - end -->

                </div>
                <!-- conference-content-wrapper - end -->
                @endforeach
            </div>
		</section>
		<!-- conference-section - end
		================================================== -->


		<!-- service-section - start
		================================================== -->
		<section id="service-section" class="service-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- service-wrapper - start -->
				<div class="service-wrapper">


                    @foreach($packs as $pack)
                    
                    @endforeach

				</div>
				<!-- service-wrapper - end -->

			</div>
		</section>
		<!-- service-section - end
		================================================== -->

		<!-- special-offer-section - start
		================================================== -->
		<section id="special-offer-section" class="special-offer-section clearfix" style="background-image: url({{asset('/assets/images/special-offer-bg.png')}});">
			<div class="container">
				<div class="row">

					<!-- special-offer-content - start -->
					<div class="col-lg-9 col-md-12 col-sm-12">
						<div class="special-offer-content">
							<h2><strong>30%</strong> Off in June~July for <span>Birthday Events</span></h2>
							<p class="m-0">
								Contact us now and we will make your event unique & unforgettable
							</p>
						</div>
					</div>
					<!-- special-offer-content - end -->

					<!-- event-makeing-btn - start -->
					<div class="col-lg-3 col-md-12 col-sm-12">
						<div class="event-makeing-btn">
							<a href="#!">make an event now</a>
						</div>
					</div>
					<!-- event-makeing-btn - end -->

				</div>
			</div>
		</section>
		<!-- special-offer-section - end
		================================================== -->


@endsection
