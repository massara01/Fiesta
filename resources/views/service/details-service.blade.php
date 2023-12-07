@extends('layouts.app')
@section('title','DETAILS SERVICES')
@section('content')
    <style>
        .sticky-header-section{
            background-color:#333333!important
        }
        .default-header-p {
            padding-top: 110px;
        }
        #panorama {
            width: 100%;
            height: 420px;
        }
    </style>
    
    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix" style="padding-top: 110px">
        <div class="jarallax" style="background-image: url({{ asset('assets/images/breadcrumb/0.breadcrumb-bg.jpg')}});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-12 col-sm-12">

                            <!-- breadcrumb-title - start -->
                            <div class="breadcrumb-title text-center mb-50">
                                <h2 class="big-title">La Fiesta <strong>service details</strong></h2>
                            </div>
                            <!-- breadcrumb-title - end -->

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="index-1.html" class="breadcrumb-link">Acceuil</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$service->name}}</li>
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

    <!-- event-details-section - start
    ================================================== -->
    <section id="event-details-section" class="event-details-section sec-ptb-100 clearfix">
        <div class="container">
            <div class="row">

                <!-- sidebar-section - start -->
                <div class="col-lg-2 col-md-12 col-sm-12"></div>
                <!-- sidebar-section - end -->

                <!-- col - event-details - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- event-details - start -->
                    <div class="event-details mb-80">

                        <div class="event-title mb-30" style="float:left">
                            <span class="tag-item">
                                <i class="fas fa-bookmark"></i>
                                Service
                            </span>
                            <h2 class="event-title"><strong>{{$service->name}}</strong></h2>
                        </div>

                        <!-- Add to Calendar - start -->
                        <div class="addeventat">
                            <i class="fas fa-heart" style="color: #fa0000;"></i> Ajouter au Favoris 
                        </div>
                        <!-- Add to Calendar - end -->


                        <div  class="event-details-carousel ">
                                <img src="{{asset('/public/assets/images/'.$service->image)}}" alt="Image_not_found">
                        </div>
                        

                        <div class="event-info-list ul-li clearfix mb-50">
                            <ul>
                                <li>
                                    <span class="icon">
                                        <i class="fas fa-ticket-alt"></i>
                                    </span>
                                    <div class="event-content">
                                        <small class="event-title">Catégorie</small>
                                        <h3 class="event-date">{{ $service->typename }}</h3>
                                    </div>
                                </li>
                                
                                <li>
                                    <span class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <div class="event-content">
                                        <small class="event-title">Adresse</small>
                                        <h3 class="event-date">{{ $service->adress }}</h3>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <p class="black-color mb-30">
                            {{$service->description}}
                        </p>

                        @if(!empty($service->image360))
                            <h2 class="big-title">Image <strong>360°</strong></h2>

                            <div  class="event-details-carousel ">
								<div id="panorama" data-path="{{asset('/public/assets/images/'. $service->image360)}}" ></div>
                            </div>
                        @endif
                        <div class="d-flex align-items-center list-action mt-5">
                            <form action="{{route('service.show.details',$service->id)}}" class="mr-2">                         
                                <button class="custom-btn">Ajouter au panier</button>
                            </form>
                        </div>

                    </div>
                    <!-- event-details - end -->

                    @if($temoignages->count() !=0)
                    <!-- reviewer-comment-wrapper - start -->
                    <div class="reviewer-comment-wrapper mb-30 clearfix">

                        <div class="section-title text-left mb-50">
                            <h2 class="big-title"><strong>Témoignages</strong> du service</h2>
                        </div>


                        @foreach($temoignages as $temoignage)

                        <div class="comment-bar clearfix">
                            <div class="admin-image">
                                <img src="{{asset('assets/images/profil.png')}}" alt="Image_not_found">
                            </div>

                            <div class="comment-content">
                                <div class="admin-name mb-15">
                                    <div class="rateing-star ul-li clearfix">
                                        <ul>
                                            @for($i=1;$i<=$temoignage->rating;$i++)
                                            <li class="rated"><i class="fas fa-star"></i></li>
                                            @endfor
                                            @for($i=1;$i<=(5-$temoignage->rating);$i++)
                                            <li class=""><i class="fas fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="name">
                                        <span>{{ $temoignage->userName }}</span><br>
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <p class="mb-30">
                                        {{ $temoignage->contenu }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                
                    @endif

                    <!-- comment-form - start -->
                    <div class="comment-form clearfix">
                        <form action="{{route('temoignage.add',$service->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="section-title text-left mb-50">
                                <h2 class="big-title">Ajouter un <strong>témoignage</strong></h2>

                                <div class="rateing-star-wrapper">
                                    <div class="rateing-star-form float-right">
                                        <div class="form-check clearfix">
                                            <input name="rating[]" value="1" type="checkbox">
                                        </div>
                                        <div class="form-check clearfix">
                                            <input name="rating[]" value="2" type="checkbox">
                                        </div>
                                        <div class="form-check clearfix">
                                            <input name="rating[]" value="3" type="checkbox">
                                        </div>
                                        <div class="form-check clearfix">
                                            <input name="rating[]" value="4" type="checkbox">
                                        </div>
                                        <div class="form-check clearfix">
                                            <input name="rating[]" value="5" type="checkbox">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-wrapper">
                                <div class="row">
                                    <!-- form-item - start -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-item mb-30">
                                            <input type="text" name="userName" placeholder="Nom & prénom" required>
                                        </div>
                                    </div>
                                    <!-- form-item - end -->

                                    <!-- form-item - start -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-item mb-30">
                                            <input type="email" name="userEmail" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <!-- form-item - end -->

                                    

                                    <!-- form-item - start -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-30">
                                            <textarea name="contenu" placeholder="Témoignage" required></textarea>
                                        </div>
                                        <button type="submit" class="custom-btn">Témoigner</button>
                                    </div>
                                    <!-- form-item - end -->

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- comment-form - end -->

                </div>
                <!-- col - event-details - end -->

                <!-- sidebar-section - start -->
                <div class="col-lg-2 col-md-12 col-sm-12"></div>
                <!-- sidebar-section - end -->
                
            </div>
        </div>
    </section>
    <!-- event-details-section - end
    ================================================== -->

@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
<script>
	const element = document.getElementById("panorama");
	const path = element.getAttribute("data-path");

    pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": path,
    "autoLoad": true
});
</script>
		
@endsection