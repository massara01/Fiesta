@extends('layouts.app')
@section('title','NOS SERVICES')
@section('content')

    <style>
        .sticky-header-section{
            background-color:#333333!important
        }
        .default-header-p {
            padding-top: 110px!important;
        }
		.panorama {
        width: 100%!important;
        height: 420px!important;
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
									<h2 class="big-title">Fiesta <strong>services</strong></h2>
								</div>
								<!-- breadcrumb-title - end -->

								<!-- breadcrumb-list - start -->
								<div class="breadcrumb-list">
									<ul>
										<li class="breadcrumb-item"><a href="index-1.html" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item"><a href="#!" class="breadcrumb-link">About</a></li>
										<li class="breadcrumb-item active" aria-current="page">services</li>
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


		<!-- service-section - start
		================================================== -->
		<section id="service-section" class="service-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- service-wrapper - start -->
				<div class="service-wrapper">
                @foreach($LServices as $service)
				@if( $loop->index %2==0)
				<!--<img src="{{asset('/public/assets/images/'. $service->image)}}" width="100px"><br/>-->
					<!-- service-item - start -->
					<div class="service-item clearfix " >
						<div class="service-image float-left">
							<div class="big-image">
								@if(!empty($service->image360))
								<div id="panorama{{$service->id}}" class="panorama" data-path="{{asset('/public/assets/images/'. $service->image360)}}" ></div>
								@else
								<img src="{{asset('/public/assets/images/'. $service->image)}}" id="immm" alt="Image_not_found">
								@endif
							</div>
						</div>
						<div class="service-content float-right">
							<div class="service-title mb-10">
								<h2 class="title-text"><strong>{{$service['name']}}</strong></h2>
								<span class="service-price">{{$service['typename']}}  |  Le Prix à partir de {{$service['price']}} DT</span>
							</div>
							<p class="service-description black-color mb-30">{{$service['description']}}</p>
							<div class="service-type-list mb-50 clearfix">
								<span class="icon">
									<i class="fas fa-arrow-circle-right"></i>
								</span>
								{{$service['adress']}}
							</div>
							<div class="d-flex align-items-center list-action">
								<form action="{{route('service.show.details',$service->id)}}" class="mr-2">                         
									<button class="custom-btn" >Détails</button>
								</form>
								<form action="{{route('cart.add',$service->id)}}">   
									<button class="conference-btn">Ajouter au panier</button>
								</form>
							</div>
						</div>
					</div>
                    <br/>
                    <br/>
					<!-- service-item - end -->
					@else
					<!-- service-item - start -->
					<div class="service-item clearfix">
						<div class="service-image float-right">
						<div class="big-image">
							@if(!empty($service->image360))
							<div id="panorama{{$service->id}}" class="panorama" data-path="{{asset('/public/assets/images/'. $service->image360)}}" ></div>
							@else
							<img src="{{asset('/public/assets/images/'. $service->image)}}" id="immm" alt="Image_not_found">
							@endif
							</div>
						</div>
						<div class="service-content float-left">
							<div class="service-title mb-10">
								<h2 class="title-text"><strong>{{$service['name']}}</strong></h2>
								<span class="service-price">{{$service['typename']}}  |   Le Prix à partir de {{$service['price']}} DT</span>
							</div>
							<p class="service-description black-color mb-30">{{$service['description']}}</p>
							<div class="service-type-list mb-50 clearfix">
													
								<span class="icon">
									<i class="fas fa-arrow-circle-right"></i>
								</span>
								{{$service['adress']}}
									
							</div>
							<div class="d-flex align-items-center list-action">
							<form action="{{route('service.show.details',$service->id)}}" class="mr-2">                         
								<button class="custom-btn" >Détails</button>
							</form>
							<form action="{{route('cart.add',$service->id)}}">   
								<button class="conference-btn">Ajouter au panier</button>
							</form>
								
							</div>
						</div>
					</div>
					<!-- service-item - end -->
					@endif
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
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
<script>
	@foreach($LServices as $service)
	@if(!empty($service->image360))
	const element{{$service->id}} = document.getElementById("panorama{{$service->id}}");

    pannellum.viewer('panorama{{$service->id}}', {
    "type": "equirectangular",
    "panorama": element{{$service->id}}.getAttribute("data-path"),
    "autoLoad": true
});
@endif
@endforeach
</script>
		
@endsection