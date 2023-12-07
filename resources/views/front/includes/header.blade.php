


		<!-- header-section - start
		================================================== -->
		<header id="header-section" class="header-section sticky-header-section not-stuck clearfix">
			<!-- header-bottom - start -->
			<div class="header-bottom">
				<div class="container">
					<div class="row">

						<!-- site-logo-wrapper - start -->
						<div class="col-lg-3">
							<div class="site-logo-wrapper">
								<a href="{{route('home')}}" class="logo">
									<img src="{{ asset('assets/images/Fiesta.png')}}" style="width:30%" alt="logo_not_found">
								</a>
							</div>
						</div>
						<!-- site-logo-wrapper - end -->

						<!-- mainmenu-wrapper - start -->
						<div class="col-lg-9">
							<div class="mainmenu-wrapper">
								<div class="row">

									<!-- menu-item-list - start -->
									<div class="col-lg-10">
										<div class="menu-item-list ul-li clearfix">
											<ul>
												<li class="menu-item-has-children active">
													<a href="{{route('home')}}">Acceuil</a>
												</li>
												
												<li class="menu-item-has-children">
													<a href="{{route('service.show.list')}}">Nos Services</a>
													<!--<ul class="sub-menu">
														<li class="menu-item-has-children">
															<a href='event-1.html'>event List</a>
															<ul class="sub-menu">
																<li><a href="event-1-without-sidebar.html">list without sidebar</a></li>
															</ul>
														</li>
														<li class="menu-item-has-children">
															<a href='event-2.html'>event Grid</a>
															<ul class="sub-menu">
																<li><a href="event-2-without-sidebar.html">grid without sidebar</a></li>
															</ul>
														</li>
														<li><a href='event-details.html'>event details</a></li>
														<li><a href='booking.html'>event booking</a></li>
													</ul>-->
												</li>
												<li class="menu-item-has-children">
													<a href="{{route('packs.show.list')}}">Nos Packs</a>

													<!--<ul class="sub-menu">
														<li><a href='blog.html'>blog</a></li>
														<li><a href='blog-details.html'>blog details</a></li>
													</ul>-->
												</li>
												<li class="menu-item-has-children">
													<a href="#">Contacts</a>

													<!--<ul class="sub-menu">
														<li><a href="contact.html">contact us</a></li>
													</ul>-->
												</li>
											</ul>
										</div>
									</div>
									<!-- menu-item-list - end -->

									<!-- menu-item-list - start -->
									<div class="col-lg-2">
										<div class="menu-item-list ul-li clearfix">
											<ul>
												<li class="menu-item-has-children">
													<a  href="#!"><i class="fas fa-user"></i></a>
													<ul class="sub-menu" style="min-width: 200px">
														@guest
															<li><a href="{{route('login')}}" >Connexion</a></li>
															<li><a href="{{route('register')}}">Inscription</a></li>
														@else
															<li><a href="{{route('get.user.account')}}" >Mon Compte {{Auth::user()->role}}</a></li>
															<li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Déconnexion</a></li>
															<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
																@csrf
															</form>
														@endguest
													</ul>
												</li>
												
												<li class="menu-item-has-children">
													<a style="letter-spacing:0px" href="#"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count()}}</span></a>

													<!-- search-body - start -->
													<ul class="profile_drop sub-menu sub-menu2" style=" margin-top:70px; margin-right:-40px">
																

														<div class="search-form" style="width:300px;" >
															@if(Cart::count()==0)
															<div class="emtycart" style="text-align:center;">
																<i style="font-size:72px" class="fa fa-cart-plus mr-4"></i><br><br>
																<span>Votre panier est encore vide !</span><br>
																<div class="summary-checkout"style="width:100%;">
																	<a  href="{{ route('service.show.list') }}"  ><button class="custom-btn pt-2 pb-2 mt-4" style="font-weight:bold!important;color:white; ">Nos Services</button></a>
																</div>
															</div>
															@else
																<div class="summary-total-items" style="text-align: center;margin-top:-30px"><i class="fa fa-shopping-cart"></i><span class="badge">{{Cart::count()}}</span> </div> 
																<div class="summary-delivery pt-2">
																	@foreach($cartItems as $cartItem)
																	@if($cartItem->options->type == 'service')
																	<div class="listchek">
																		<img style="width:60px;float:left; margin-right:10px;" src="{{ asset('/public/assets/images/'.$cartItem->options->image) }}" alt="Image_not_found">
																		<h6>
																			<span style="float:right;">
																				<form  style="width:100%;  color:white" action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
																					{{csrf_field()}}
																					{{method_field('DELETE')}}
																					<button class="" style="color:white" type="submit" ><i class="fa fa-times"></i></button>
																				</form>
																			</span>
																		</h6>
																		
																		<strong><span style="color:white">{{$cartItem->qty}} x {{ $cartItem->name}}</span></strong><br>
																		{{ $cartItem->price}}DT

																	</div>
																	@elseif($cartItem->options->type=="pack")
																	<div class="listchek">
																		<span style="width:60px;float:left; margin-top:10px; margin-right:10px;"> <strong>Pack:</strong></span>
																		<h6>
																			<span style="float:right;">
																				<form  style="width:100%;  color:white" action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
																					{{csrf_field()}}
																					{{method_field('DELETE')}}
																					<button class="" style="color:white" type="submit" ><i class="fa fa-times"></i></button>
																				</form>
																			</span>
																		</h6>
																		
																		<strong><span style="color:white">{{$cartItem->qty}} x {{ $cartItem->name}}</span></strong><br>
																		{{ $cartItem->price}}DT Remise de {{$cartItem->options->remise}}% 

																	</div>
																	@endif
																	@endforeach
																</div><br>

																<div class="summary-total mr-2" style="text-align:right ">
																	<div class="total-title" style="color:white">Total</div>
																	<div class="total-value final-value" id="basket-total"><b>{{Cart::subtotal()}}DT</b></div>
																</div> <br>
																<div class="summary-checkout"style="width:100%!important; text-align:center!important">
																	<a  href="{{ route('cart.index') }}"  ><button class="custom-btn pt-2 pb-2 mr-4" style="font-weight:bold!important;color:white; ">Panier d'achats</button></a>
																</div>
															@endif
														</div>
														<!-- search-body - end -->
													</ul>
												</li>

												
											</ul>
										</div>
									</div>
									<!-- menu-item-list - end -->
								</div>
							</div>
						</div>
						<!-- mainmenu-wrapper - end -->

					</div>
				</div>
			</div>
			<!-- header-bottom - end -->
		</header>
		<!-- header-section - end
		================================================== -->





		<!-- altranative-header - start
		================================================== -->
		<div class="header-altranative">
			<div class="container">
				<div class="logo-area float-left">
					<a href="index-1.html">
						<img src="{{ asset('assets/images/Fiesta.png')}}" style="width:50%" alt="logo_not_found">
					</a>
				</div>

				<button type="button" id="sidebarCollapse" class="alt-menu-btn float-right">
					<i class="fas fa-bars"></i>
				</button>
			</div>

			<!-- sidebar menu - start -->
			<div class="sidebar-menu-wrapper">
				<div id="sidebar" class="sidebar">
					<span id="sidebar-dismiss" class="sidebar-dismiss">
						<i class="fas fa-arrow-left"></i>
					</span>

					<div class="sidebar-header">
						<a href="#!">
							<img src="{{ asset('assets/images/Fiesta.png')}}" style="width:50%" alt="logo_not_found">
						</a>
					</div>

					<!-- sidebar-form - start -->
					<div class="sidebar-form">
						<form action="#">
							<input id="altmenu-sidebar-search" type="search" placeholder="Search">
							<label for="altmenu-sidebar-search"><i class="fas fa-search"></i></label>
						</form>
					</div>
					<!-- sidebar-form - end -->

					<!-- main-pages-links - start -->
					<div class="menu-link-list main-pages-links">
						<h2 class="menu-title">all home pages</h2>
						<!--<ul>
							<li class="active">
								<a href="index-1.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									Home V.1
								</a>
							</li>
							<li>
								<a href="index-2.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									Home V.2
								</a>
							</li>
							<li>
								<a href="index-3.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									Home v.3
								</a>
							</li>
							<li>
								<a href="index-4.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									Home v.4
								</a>
							</li>
						</ul>-->
					</div>
					<!-- main-pages-links - end -->

					<!-- other-pages-links - start -->
					<div class="menu-link-list other-pages-links">
						<h2 class="menu-title">all single pages</h2>
						<ul>
							<!--<li>
								<a href="about.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									About Us
								</a>
							</li>
							<li>
								<a href="service.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									our Services
								</a>
							</li>
							<li>
								<a href="event-1.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									event list
								</a>
							</li>
							<li>
								<a href="event-2.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									event grid
								</a>
							</li>
							<li>
								<a href="event-1-without-sidebar.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									list without sidebar
								</a>
							</li>
							<li>
								<a href="event-2-without-sidebar.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									grid without sidebar
								</a>
							</li>
							<li>
								<a href="blog.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									Latest blogs
								</a>
							</li>
							<li>
								<a href="gallery.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									our gallery
								</a>
							</li>
							<li>
								<a href="speaker.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									event speakers
								</a>
							</li>
							<li>
								<a href="contact.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									contact us
								</a>
							</li>-->
						</ul>
					</div>
					<!-- other-pages-links - end -->

					<!-- inner-pages-links - start -->
					<div class="menu-link-list inner-pages-links">
						<h2 class="menu-title">all inner pages</h2>
						<ul>
							<!--<li>
								<a href="booking.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									event booking
								</a>
							</li>
							<li>
								<a href="event-details.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									event details
								</a>
							</li>
							<li>
								<a href='blog-details.html'>
									<span class="icon"><i class="fas fa-home"></i></span>
									blog details
								</a>
							</li>
							<li>
								<a href="faq.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									Frequently Ask Qusetion
								</a>
							</li>
							<li>
								<a href="404-error.html">
									<span class="icon"><i class="fas fa-home"></i></span>
									404 error
								</a>
							</li>-->
						</ul>
					</div>
					<!-- inner-pages-links - end -->

					<!-- login-btn-group - start -->
					<div class="login-btn-group">
						<ul>

							<!--<li>
								<a href="{{route('register')}}" class="register-modal-btn">
									Register
								</a>
							
							</li>
							<li>
								<a href="{{route('login')}}" class="">
									Login
								</a>
								
							</li>-->
							
						</ul>
					</div>
					<!-- login-btn-group - end -->

					

					<div class="overlay"></div>
				</div>
			</div>
			<!-- sidebar menu - end -->
		</div>
		<!-- altranative-header - end
		================================================== -->