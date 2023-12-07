@extends('layouts.app')
@section('title','AJOUT SERVICES')
@section('content')
    <style>
        .sticky-header-section{
            background-color:#333333!important
        }
        .default-header-p {
            padding-top: 110px;
        }

        
        .file-upload .file-upload-select,.file-upload .file-upload-select1 {
            display: block;
            cursor: pointer;
            text-align: left;
            overflow: hidden;
            position: relative;
            background: rgba(230,230,230,1);
            border: 1px solid transparent;
            height: 40px;
            color: black;
            font-size: 16px;
            line-height: 20px;
            width: 100%;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 0 7px;
        }
        .file-upload .file-upload-select .file-select-button,.file-upload .file-upload-select1 .file-select-button1 {
            background: rgba(230,230,230,1);
            border-right: #c1c1c1 solid 1px;
            padding: 10px;
            display: inline-block;
        }
        .file-upload .file-upload-select .file-select-name,.file-upload .file-upload-select1 .file-select-name1 {
            display: inline-block;
            padding: 10px;
        }
        .file-upload .file-upload-select:hover .file-select-button,.file-upload .file-upload-select1:hover .file-select-button1 {
            background: rgba(230,230,230,1);
            color: black;
            transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
        }
        .file-upload .file-upload-select input[type="file"],.file-upload .file-upload-select1 input[type="file"] {
            display: none;
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
                                    <a class="nav-link "  href="{{ route('get.user.account') }}" aria-selected="true">Mes Infos Perso</a>
                                </li>
                                @if($user->role == "client")
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('AbonnementList') }}" aria-selected="false">Mes Abonnements</a>
                                    </li>
                                @elseif($user->role=="prestataire") 
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('service.show.account')}}" aria-selected="false">Mes Services</a>
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
                                        
                                        <li class="nav-item ">
                                            <a class="nav-link"   href="{{ route('get.user.account') }}" aria-selected="false">Mes Infos Perso</a>
                                        </li>

                                        @if($user->role == "client")
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('AbonnementList') }}"  aria-selected="false">Mes Abonnements</a>
                                        </li>
                                        @elseif($user->role=="prestataire") 
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{route('service.show.account')}}"  aria-selected="false">Mes Services</a>
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
                        <div class="col-12 col-lg-12">
                            <form action="{{route('service.add')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="profile__form">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="profile__title2">Ajouter un service</h4>
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
                                                <label class="profile__label2" for="nom">Nom du service:</label>
                                                <input id="nom" type="text" class="profile__input2" name="name" value="{{old('name')}}" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <div class="profile__group">
                                                <label class="profile__label2" for="prenom">Prix (DT):</label>
                                                <input type="number" class="profile__input2" name="price"  required>
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <div class="profile__group">
                                                <label class="profile__label2" for="nom">Adresse:</label>
                                                <input  type="text" class="profile__input2" name="adress"  required>
                                                @error('adress')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            
                                            <div class="sign__group">
                                                <label class="profile__label2" for="id_pays">Type du service:</label>
                                                <select class="@error('typename') is-invalid @enderror sign__input2 profile__input2" name="typename">
                                                    <option style="color: rgba(255,255,255,0.6);"value="">Type du service:</option>
                                                    @foreach($typesS as $ty)
                                                            <option value="{{$ty->typename}}">{{$ty['typename']}}</option>
                                                        </option>
                                                    @endforeach

                                                </select>
                                                @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="profile__group">
                                                <label class="profile__label2" for="nom">Image:</label>
                                                <div class="file-upload">
                                                    <div class="file-upload-select">
                                                        <div class="file-select-button" >Choisir image</div>
                                                    <div class="file-select-name">Aucun image choisi...</div> 
                                                    <input type="file" value="{{old('image')}}" name="image" id="file-upload-input">
                                                    </div>
                                                </div>
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="profile__group">
                                                <label class="profile__label2" for="nom">Image 360°:</label>
                                                <div class="file-upload">
                                                    <div class="file-upload-select1">
                                                        <div class="file-select-button1" >Choisir image 360°</div>
                                                    <div class="file-select-name1">Aucun image choisi 360° ...</div> 
                                                    <input type="file" value="{{old('image360')}}" name="image360" id="file-upload-input1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="profile__group">
                                                <label class="profile__label2" for="nom">Description:</label>
                                                <textarea  class="profile__input2" name="description" >{{old('description')}}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        </div>
                                            <button type="submit" name="serviceFront" class="about-btn custom-btn">Ajouter</button>
                                        </div>

                                

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </div>
    <!-- end content -->
@endsection
@section('script')
<script>
    $(document).ready(function(){

        let fileInput = document.getElementById("file-upload-input");
        let fileSelect = document.getElementsByClassName("file-upload-select")[0];
        fileSelect.onclick = function() {
            fileInput.click();
        }
        fileInput.onchange = function() {
            let filename = fileInput.files[0].name;
            let selectName = document.getElementsByClassName("file-select-name")[0];
            selectName.innerText = filename;
        }

        let fileInput1 = document.getElementById("file-upload-input1");
        let fileSelect1 = document.getElementsByClassName("file-upload-select1")[0];
        fileSelect1.onclick = function() {
            fileInput1.click();
        }
        fileInput1.onchange = function() {
            let filename1 = fileInput1.files[0].name;
            let selectName1 = document.getElementsByClassName("file-select-name1")[0];
            selectName1.innerText = filename1;
        }

    })
</script>
@endsection