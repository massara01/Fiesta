@extends('layouts.app')
@section('title','MES ABONNEMENTS')
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
										<a class="nav-link active" href="{{ route('AbonnementList') }}" aria-selected="false">Mes Abonnements</a>
									</li>
								@elseif($user->role=="prestataire") 
									<li class="nav-item">
										<a class="nav-link" href="{{ route('ServicesList') }}" aria-selected="false">Mes Prestations</a>
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
                                            <a class="nav-link" href="{{ route('AbonnementList') }}"  aria-selected="false">Mes Abonnements</a>
                                        </li>
										@elseif($user->role=="prestataire") 
										<li class="nav-item">
                                            <a class="nav-link" href="{{ route('ServicesList') }}"  aria-selected="false">Mes Prestataion</a>
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
										<h4 class="profile__title2">Mes Abonnements</h4>
                                    </div>

                                    <div class="col-md-12 offset-md-2">
                            
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        
                                    </div>
                                        <div class="card col-md-12">
                                            
                                            <div class="card-body">
                                
                                                <table class="table dataTable no-footer" style="width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead class="light">
                                                        <tr role="row">
                                                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 62px;">ID</th>
                                                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 70px;">Date</th>
                                                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 90px;">Services</th>
                                                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 90px;">Packs</th>
                                                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 70px;">Prix Totale</th>
                                                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 70px;">Facture</th>
                                                        <!--<th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate " style="width: 90px;">Action</th>-->
                                
                                                        </tr>
                                
                               
                                                    </thead>
                                
                                                    <tbody>
													
                                                        @foreach ($reservation as $Reservation)
														@if($user->email == $Reservation->email)
                                                        <tr>
                                
                                                            <td><strong>{{$Reservation->idR}}</strong></td>
                                                            <td>{{$Reservation['date']}}</td>
                                                            <td style="width:150px">
																@foreach(unserialize($Reservation->services) as $service)
																@if(!empty($service['name']))<strong>{{$service['name']}}</strong> ({{$service['qty']}} x {{$service['price']}}DT)<br> @endif
																@endforeach	
															</td>
															<td style="width:150px">
																@foreach(unserialize($Reservation->packs) as $pack)
																	@if(!empty($pack['name'])) <strong>{{$pack['name']}}</strong>   ({{$pack['price']}}DT)<br>@endif
																@endforeach	
															</td>
                                                            <td>{{$Reservation['prix']}}DT</td>
                                                            <td> <a class="mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Télécharger Reçu" href="Recu/{{$Reservation->idR}}">
                                        					<img src="../assets/images/pdf.png" class="img-fliud"></a></td>
													       
                                                                </div>
                                                            </td>
                                                           
                                                        </tr>
														@endif 
												@endforeach
                                                     
                                
                                
                                                    </tbody>
                                
                                                </table>
                            
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