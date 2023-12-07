@extends('layouts.app')
@section('title','MON COMPTE')
@section('content')

	<style>
		.sticky-header-section{
			background-color:#333333!important
		}
		.default-header-p {
			padding-top: 110px;
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
									<a class="nav-link active"  href="{{ route('get.user.account') }}" aria-selected="true">Mes Infos Perso</a>
								</li>
                                @if($user->role == "client")
									<li class="nav-item">
										<a class="nav-link" href="{{ route('AbonnementList') }}" aria-selected="false">Mes Abonnements</a>
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
										
                                        <li class="nav-item active">
                                            <a class="nav-link"   href="{{ route('get.user.account') }}" aria-selected="false">Mes Infos Perso</a>
                                        </li>

										@if($user->role == "client")
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('AbonnementList') }}"  aria-selected="false">Mes Abonnements</a>
                                        </li>
										@elseif($user->role=="prestataire") 
										<li class="nav-item">
                                            <a class="nav-link" href="{{route('service.show.account')}}"  aria-selected="false">Mes Services</a>
                                        </li>
										@endif
                                    </ul>
								</div>
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
										<h4 class="profile__title2">Mes informations personnelles</h4>
									</div>

								
									<br><br>
										<div class="col-12 col-md-16 mt-4">
											<div class="profile__group border__profile--first">
												<div class="row">
													<div class="col-12 col-sm-6 col-lg-3">
														<label class="profile__label2" for="username"><b>Nom:</b></label>
													</div>
													<div class="col-12 col-sm-6 col-lg-9">
														<label class="profile__label2" for="username">{{ $user->nom }}</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12">
											<div class="profile__group border__profile--first">
												<div class="row">
													<div class="col-12 col-sm-6 col-lg-3">
														<label class="profile__label2" for="username"><b>Prénom:</b></label>
													
													</div>
													<div class="col-12 col-sm-6 col-lg-9">
														<label class="profile__label2" for="username">{{ $user->prenom }}</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12">
											<div class="profile__group border__profile--first">
												<div class="row">
													<div class="col-12 col-sm-6 col-lg-3">
														<label class="profile__label2" for="username"><b>Pays:</b></label>
													
													</div>
													<div class="col-12 col-sm-6 col-lg-9">
														<label class="profile__label2" for="username">{{ $user->pays->name }}</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12">
											<div class="profile__group border__profile">
												<div class="row">
													<div class="col-12 col-sm-6 col-lg-3">
														<label class="profile__label2" for="username"><b>Date de naissance:</b></label>
													
													</div>
													<div class="col-12 col-sm-6 col-lg-9">
														<label class="profile__label2" for="username">{{ date('d/m/Y', strtotime($user->date_naiss)) }}</label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-12">
											<div class="profile__group border__profile">
												<div class="row">
													<div class="col-12 col-sm-6 col-lg-3">
														<label class="profile__label2" for="username"><b>Genre:</b></label>
													
													</div>
													<div class="col-12 col-sm-6 col-lg-9">
														<label class="profile__label2" for="username">@if($user->genre=='Femme') Femme @elseif($user->genre=='Homme') Homme @else @endif</label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-12">
											<div class="profile__group border__profile">
												<div class="row">
													<div class="col-12 col-sm-6 col-lg-3">
														<label class="profile__label2" for="username"><b>Email:</b></label>
													
													</div>
													<div class="col-12 col-sm-6 col-lg-9">
														<label class="profile__label2" for="username">{{ $user->email }}</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12">
											<div class="profile__group border__profile">
												<div class="row">
													<div class="col-12 col-sm-6 col-lg-3">
														<label class="profile__label2" for="username"><b>Tel:</b></label>
													
													</div>
													<div class="col-12 col-sm-6 col-lg-9">
														<label class="profile__label2" for="username">{{ $user->tel }}</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12">
											
										</div>
										
										
								</div>
							</div>
						</div>
					
						<!-- end details form -->					
			
					</div>
					<div class="text-left">
						<a href="{{route('get.user.edit')}}" class="about-btn custom-btn  ml-2 mt-1">Modifier	</a>

					</div>

				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</div>
	<!-- end content -->
	
	@endsection