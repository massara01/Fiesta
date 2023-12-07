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
	
    <section id="breadcrumb-section" class="breadcrumb-section clearfix default-header-p">
		<div class="jarallax" style="background-image: url({{asset('assets/images/breadcrumb/0.breadcrumb-bg.jpg')}});">
			<div class="overlay-black">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-12 col-sm-12">

							<!-- breadcrumb-title - start -->
							<div class="breadcrumb-title text-center mb-50">
								<h2 class="big-title">Mon compte <strong>La Fiesta</strong></h2>
							</div>
							<!-- breadcrumb-title - end -->

							<!-- breadcrumb-list - start -->
							<div class="breadcrumb-list">
								<ul>
									<li class="breadcrumb-item"><a href="index-1.html" class="breadcrumb-link">Acceuil</a></li>
									<li class="breadcrumb-item active" aria-current="page">Mon compte</li>
								</ul>
							</div>
							<!-- breadcrumb-list - end -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	<!-- page title -->
	<section class="section5 mt-5 " style="background-color:white!important;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- section title -->
					<h2 class="section__title1"><strong> Mon Compte </strong></h2>
					<!-- end section title -->
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

    <!-- content -->
	<div class="content mt-4" style="background-color:white!important;">
		<!-- profile -->
		<div class="profile2">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="profile__content5">

							<div class="profile__user">
								<div class="profile__avatar">
									<img src="{{asset('assets/images/user.svg')}}" alt="">
								</div>
								<div class="profile__meta2">
									<h3>{{ $user->prenom }}</h3>
									<span>{{ $user->nom }}</span>
								</div>
							</div>

							<!-- content tabs nav -->
							<ul class="nav nav-tabs content__tabs4 content__tabs--profile" id="content__tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link"  href="{{ route('get.user.account') }}" aria-selected="true">Mes Infos Perso</a>
								</li>
                                @if($user->role == "client")
									<li class="nav-item">
										<a class="nav-link active" href="{{ route('serviceList') }}" aria-selected="false">Mes Abonnements</a>
									</li>
								@elseif($user->role=="prestataire") 
									<li class="nav-item">
										<a class="nav-link" href="{{route('service.show.account')}}" aria-selected="false">Mes Services</a>
									</li>
								@endif
							</ul>
							<!-- end content tabs nav -->

							<!-- content mobile tabs nav -->
							<div class="content__mobile-tabs4 content__mobile-tabs--profile" id="content__mobile-tabs">
								<div class="content__mobile-tabs-btn " role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Mes Infos Perso">
									<span></span>
								</div>

								<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
									<ul class="nav nav-tabs" role="tablist">
										
                                        <li class="nav-item">
                                            <a class="nav-link"   href="{{ route('get.user.account') }}" aria-selected="false">Mes Infos Perso</a>
                                        </li>

										@if($user->role == "client")
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#"  aria-selected="false">Mes Abonnements</a>
                                        </li>
										@elseif($user->role=="prestataire") 
										<li class="nav-item">
                                            <a class="nav-link" href="{{route('service.show.account')}}"  aria-selected="false">Mes services</a>
                                        </li>
										@endif
                                    </ul>
								</div>
							</div>
                            <div class="profile__meta3">
								<a class="about-btn custom-btn" style="box-shadow: none" href="{{route('service.store')}}" >Ajouter un service</a>
                        	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end profile -->

		<div class="container" >
			<!-- content tabs -->
			<div class="tab-content" >
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
					<div class="row">
						<!-- details form -->
						
						<div class="col-12 col-lg-12">
							<div class="profile__form">
								<div class="row">
									<div class="col-12">
										<h4 class="profile__title2">Mes services</h4>
                                    </div>

                                    <div class="col-md-12 offset-md-2">
                            
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        
                                    </div>
                                    <div class="col-md-12">
                                        
                                                                        
                                        <div  class="event-section" >
                                                <div id="list-style" style="border: none" class="fade in active show">

                                                    @foreach($services as $service)
                                                    <!-- event-item - start -->
                                                    <div class="event-list-item clearfix">

                                                        <!-- event-image - start -->
                                                        <div class="event-image" style="height: 200px">
                                                            <img src="{{ asset('/public/assets/images/'.$service->image)}}" alt="service_image">
                                                        </div>
                                                        <!-- event-image - end -->

                                                        <!-- event-content - start -->
                                                        <div class="event-content">
                                                            <div class="event-title mb-15">
                                                                <h3 class="title">
                                                                    <strong>{{$service->name}}</strong>
                                                                </h3>
                                                                <span class="ticket-price yellow-color">Prix {{$service->price}}DT</span>
                                                            </div>
                                                            <p class="discription-text mb-15">
                                                                {{$service->description}}
                                                            </p>
                                                            <div class="event-info-list ul-li clearfix">
                                                                <ul>
                                                                    <li>
                                                                        <span class="icon">
                                                                            <i class="fas fa-microphone"></i>
                                                                        </span>
                                                                        <div class="info-content" >
                                                                            <h3 style="font-size:15px; margin-top:12px">{{$service->adress}}</h3>
                                                                        </div>
                                                                    </li>
                                                                    <li class="ml-5">
                                                                        <span class="icon">
                                                                            <i class="fas fa-ticket-alt"></i>
                                                                        </span>
                                                                        <div class="info-content" >
                                                                            <h3 style="font-size:15px;margin-top:12px">{{$service->typename}}</h3>
                                                                        </div>
                                                                    </li>
																	
																	<li class="ml-5">
                                                                        <span class="icon">
                                                                            <i class="fas fa-cubes"></i>
                                                                        </span>
                                                                        <div class="info-content" >
                                                                            <h3 style="font-size:15px;margin-top:12px">@foreach($service->pack as $pack) @if(!empty($pack->name)) {{$pack->name}} @else Aucun Pack Associé @endif @endforeach </h3>
                                                                        </div>
                                                                    </li>
                                                                   
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- event-content - end -->

                                                    </div>
                                                    @endforeach
                                                    <!-- event-item - end 

                                                    <div class="pagination ul-li clearfix">
                                                        <ul>
                                                            <li class="page-item prev-item">
                                                                <a class="page-link" href="#!">Prev</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#!">01</a></li>
                                                            <li class="page-item active"><a class="page-link" href="#!">02</a></li>
                                                            <li class="page-item"><a class="page-link" href="#!">03</a></li>
                                                            <li class="page-item"><a class="page-link" href="#!">04</a></li>
                                                            <li class="page-item"><a class="page-link" href="#!">05</a></li>
                                                            <li class="page-item next-item">
                                                                <a class="page-link" href="#!">Next</a>
                                                            </li>
                                                        </ul>
                                                    </div>-->
                                            
                                            </div>
                                        </div>

                                    </div>
								</div>
							</div>
						</div>
					
						<!-- end details form -->	
                    
                       
			
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</div>
	<!-- end content -->

@endsection