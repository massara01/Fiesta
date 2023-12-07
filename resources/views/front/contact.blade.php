@extends('layouts.app')
@section('title','CONTACTEZ-NOUS')
@section('content')
    <!-- breadcrumb-section - start
		================================================== -->
		<section id="breadcrumb-section" class="breadcrumb-section clearfix" style="padding-top: 110px">
			<div class="jarallax" style="background-image: url(assets/images/breadcrumb/0.breadcrumb-bg.jpg);">
				<div class="overlay-black">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-6 col-md-12 col-sm-12">

								<!-- breadcrumb-title - start -->
								<div class="breadcrumb-title text-center mb-50">
									<span class="sub-title">contactez-nous</span>
									<h2 class="big-title"> <strong>La Fiesta</strong> Contacts</h2>
								</div>
								<!-- breadcrumb-title - end -->

								<!-- breadcrumb-list - start -->
								<div class="breadcrumb-list">
									<ul>
										<li class="breadcrumb-item"><a href="index-1.html" class="breadcrumb-link">Acceuil</a></li>
										<li class="breadcrumb-item active" aria-current="page">contactez-nous</li>
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





		<!-- contact-section - start
		================================================== -->
		<section id="contact-section" class="contact-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- section-title - start -->
				<div class="section-title mb-50">
					<small class="sub-title">contactez-nous</small>
					<h2 class="big-title">Rester en contact <strong>avec La Fiesta</strong></h2>
				</div>
				<!-- section-title - end -->

				<!-- contact-form - start -->
				<div class="contact-form form-wrapper text-center">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

					<form action="{{route('contact.send')}}" method="post">
                        @csrf
						<div class="row">

							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-item">
									<input type="text" name="name" placeholder="Nom & prénom" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="email" name="email" placeholder="Email" required>
								</div>
							</div>

							

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="tel" name="phone" placeholder="Télphone" required>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">
								<textarea name="message" placeholder="Votre Message" required></textarea>
								<button type="submit" class="custom-btn">Envoyer</button>
							</div>
							
						</div>
					</form>
				</div>
				<!-- contact-form - end -->

			</div>
		</section>
		<!-- contact-section - end
		================================================== -->

@endsection