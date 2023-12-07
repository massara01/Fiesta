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
						
							<form action="{{ route('get.user.update') }}" method="POST" class="profile__form form-horizontal">
                            @csrf

								<div class="row">
									<div class="col-12 mb-2">
										<h4 class="profile__title3">Modifier Mes Informations Personnelles</h4>
									</div>
									
									<!-- Status message -->
                                    @if ($message = Session::get('success'))

									<div class="col-12 col-md-12 col-lg-12 col-xl-12 alert">
                                        <div class="alert alert-success" style="padding:20px 20px!important">
                                            <span>{{ $message }}</span>
                                        </div>
									</div>
                                    @endif

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="profile__group">
											<label class="profile__label2" for="nom">Nom:</label>
											<input id="nom" type="text" class="profile__input2" name="nom" value="{{ $user->nom }}" required>
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="profile__group">
											<label class="profile__label2" for="prenom">Prénom:</label>
											<input id="prenom" type="text" class="profile__input2" name="prenom" value="{{ $user->prenom }}" required>
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="sign__group">
											<label class="profile__label2" for="id_pays">Pays</label>
											<select id="id_pays" class="profile__input2" name="pays" required>
												<option style="color: rgba(255,255,255,0.6);"value="">Pays: </option>
                                                @foreach($pays as $option)
                                                    <option class="sign__input"style="background-color:rgb(230,230,230);color: black;" {{ $user->id_pays == $option->id ? 'selected':''}}  value="{{$option->id}}">
                                                       {{$option->name}}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('pays')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="profile__group">
											<label class="profile__label2" for="date_naissance">Date de naissance: </label>
											<input id="date_naissance" type="date" max="9999-12-31" class="profile__input2" style="line-height: initial!important" name="date_naissance"  value="{{ $user->date_naiss }}"  required>
                                            @error('date_naissance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>

									<div class="col-12 col-md-12 col-lg-12 col-xl-12">
										<div class="profile__group sign__group sign__group--checkbox2 ">
											
                                            <label class="profile__label2 mr-5" for="id_genre">Genre: </label>
                                            <input id="hom" {{ $user->genre == "Femme" ? 'checked':'' }} name="genre" value="Femme" type="radio" required>
                                            <label class="genre" style="padding-right:15px" for="hom">Femme</label>
                                            <input id="fem" {{ $user->genre =="Homme" ? 'checked':'' }} name="genre" value="Homme" type="radio" required>
                                            <label class="genre" style=" padding-right:15px" for="fem">Homme</label>

										</div>
                                        @error('genre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="profile__group">
											<label class="profile__label2" for="email">Email: </label>
											<input id="email" type="email" class="profile__input2"  name="email" value="{{ $user->email }}" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="profile__group">
											<label class="profile__label2" for="tel">Téléphone: </label>
											<input id="tel" type="tel" class="profile__input2"  name="tel" value="{{ $user->tel }}" required>
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
									</div>
                                 
									</div>
										<button type="submit" class="custom-btn mt-4" name="EditSubmit">Modifier</button>

								</div>
							</form>
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