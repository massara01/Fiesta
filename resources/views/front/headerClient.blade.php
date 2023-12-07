


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
								<a href="index-1.html" class="logo">
									<!--<img src="assets/images/1.site-logo.png" alt="logo_not_found">-->
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
													<a href="#!">Acceuil</a>
												</li>
												<li class="menu-item-has-children">
													<a href="#!">about</a>
													<ul class="sub-menu">
														<li><a href="about.html">about us</a></li>
													</ul>
												</li>
												<li class="menu-item-has-children">
													<a href="#!">Prestation</a>
													<ul class="sub-menu">
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
													</ul>
												</li>
												<li class="menu-item-has-children">
													<a href="#!">Témoignage</a>
													<ul class="sub-menu">
														<li><a href='blog.html'>blog</a></li>
														<li><a href='blog-details.html'>blog details</a></li>
													</ul>
												</li>
												<li>
													<a href="gallery.html">Favoris</a>
												</li>
												
												<li class="menu-item-has-children">
													<a href="#!">contact</a>
													<ul class="sub-menu">
														<li><a href="contact.html">contact us</a></li>
													
													</ul>
												</li>
											</ul>
										</div>
									</div>
									<!-- menu-item-list - end -->

									<!-- menu-item-list - start -->
									<div class="col-lg-2">
										<div class="user-search-btn-group ul-li clearfix">
											<ul>
												<li>
													<a href="{{route('login')}}" class="">
														<i class="fas fa-user"></i>
													</a>
												</li>
												<li>
													<button class="offcanvas-click1 search-btn">
														<i class="fas fa-search"></i>
													</button>
												</li>
												<div class="offcanvas">
													<a class="btn offcanvas-click offcanvas-click1">
													<i class="fa fa-times" aria-hidden="true"></i>
													</a>
													@if(Cart::count()==0)

														<div class="emtycart" style="text-align:center;margin-top:40%">
															<i style="font-size:72px" class="fa fa-cart-plus mr-4"></i><br>
															<span>Votre panier est encore vide !</span>
															<div class="summary-checkout" style="width:100%;margin-top:5%">
																<a  href="{{ route('shop') }}"  ><button class="primary-btn" style="font-weight:bold!important;color:white; ">Evénements disponibles</button></a>
															</div>
														</div>
													@else
													<div class="summary-delivery text-left">
														@foreach($cartItems as $cartItem)
															<div class="listchek"  >
																<img style="width:60px;float:left; margin-right:10px;mqrgin-top:5px" src="{{asset('/assets/img/featured/feature-4.jpg')}}" alt="Image_not_found">

																<h6>
																
																	<span style="float:left;color: black;">
																		{{$cartItem->qty}} x <b>{{ $cartItem->name}}</b> 
																		<div class="quantity mt-2">
																			<div class="pro-qty" style="width:80px!important; height:30px!important">
																				<span class="dec qtybtn prod{{$cartItem->id}}" style="width:20px!important">-</span>
																				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
																				<input type="text" name="qty"  id="qty{{$cartItem->id}}"  style="width:20px!important" value="{{$cartItem->qty}}">
																				<span class="inc qtybtn prod{{$cartItem->id}}" style="width:20px!important">+</span>
																			</div>
																		</div>
																	</span>
																	<span style="float:right">
																		<form  style="  color:balck" action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
																			{{csrf_field()}}
																			{{method_field('DELETE')}}
																			<br>
																			{{  $cartItem->qty *  $cartItem->price}}DT
																			<i class="fa fa-trash ml-1" style="color:rgb(195, 14, 14)" aria-hidden="true"></i>
																		</form>
																	</span>
																</h6>
															
															</div>
															<br><br><br><br>
														@endforeach
													</div><br>

													<div class="summary-total">
														<div class="total-title">Total</div>
														<div class="total-value final-value" id="basket-total"><b>{{Cart::subtotal()}}DT</b></div>
													</div>
													<div class="summary-checkout"style="width:100%!important">
														<a  href="{{ route('cart.index') }}"  ><button class="primary-btn">Panier d'achats</button></a>
													</div>
													@endif
												</div>
																			
												
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
						<img src="assets/images/1.site-logo.png" alt="logo_not_found">
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
							<img src="assets/images/2.site-logo.png" alt="logo_not_found">
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
						<ul>
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
						</ul>
					</div>
					<!-- main-pages-links - end -->

					<!-- other-pages-links - start -->
					<div class="menu-link-list other-pages-links">
						<h2 class="menu-title">all single pages</h2>
						<ul>
							<li>
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
							</li>
						</ul>
					</div>
					<!-- other-pages-links - end -->

					<!-- inner-pages-links - start -->
					<div class="menu-link-list inner-pages-links">
						<h2 class="menu-title">all inner pages</h2>
						<ul>
							<li>
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
							</li>
						</ul>
					</div>
					<!-- inner-pages-links - end -->

					<!-- login-btn-group - start -->
					<div class="login-btn-group">
						<ul>

							<li>
								<a href="{{route('register')}}" class="register-modal-btn">
									Register
								</a>
							
							</li>
							<li>
								<a href="{{route('login')}}" class="">
									Login
								</a>
								
							</li>
							
						</ul>
					</div>
					<!-- login-btn-group - end -->

					<!-- social-links - start -->
					<div class="social-links">
						<h2 class="menu-title">get in touch</h2>
						<div class="mb-15">
							<h3 class="contact-info">
								<i class="fas fa-phone"></i>
								100-2222-9999
							</h3>
							<h3 class="contact-info">
								<i class="fas fa-envelope"></i>
								info@harmoni.com
							</h3>
						</div>
						<ul>
							<li>
								<a href="#!"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li>
								<a href="#!"><i class="fab fa-twitter"></i></a>
							</li>
							<li>
								<a href="#!"><i class="fab fa-twitch"></i></a>
							</li>
							<li>
								<a href="#!"><i class="fab fa-google-plus-g"></i></a>
							</li>
							<li>
								<a href="#!"><i class="fab fa-instagram"></i></a>
							</li>
						</ul>
						<a href="contact.html" class="contact-btn">contact us</a>
					</div>
					<!-- social-links - end -->

					<div class="overlay"></div>
				</div>
			</div>
			<!-- sidebar menu - end -->
		</div>
		<!-- altranative-header - end
		================================================== -->
		@section('script')
 <script>
     $(document).ready(function() {
     // Update Data
         
         $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         @foreach($cartItems as $cartItem)
 
         $('.prod{{$cartItem->id}}').click( function(e){
 
             e.preventDefault();
             var qty={{$cartItem->qty}};
             if($(this).hasClass('dec')) {
                  qty = {{$cartItem->qty}}-1
             }else if($(this).hasClass('inc')) {
                  qty = {{$cartItem->qty}}+1
             }
             
             $.ajax({
                 type: "POST",
                 url: "/cart/edit/{{$cartItem->rowId}}",
                 data:{
                     '_token': $('input[name=_token]').val(),
                     'qty': qty,
                 },
                 success: function (response) {
                     console.log(response);
                     location.reload();
                 },
                 error:function(error){
                     console.log(error);
                 }
             });
         });
         @endforeach
 
     });
 
 </script>
 @endsection