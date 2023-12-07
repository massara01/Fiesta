@extends('layouts.back')
@section('title', 'Utilisateurs')
@section('content')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-4 px-4 mb-4" style="background-color: white;border-radius: 0.375rem;font-size:18px;">
                    Ajouter un <span class="text-muted fw-light">Utilisateur </span>
                    <a href="{{route('list.admin.users')}}"> <button class="primary-btn" style="float: right;">Liste des utilisateurs</button></a>
                </h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                   
                    <div class="card-body">
                      <form method="POST" action="{{route('store.admin.users')}}" enctype="multipart/form-data">
                        @csrf
                        @if(session()->has('success'))
                            <div class="container">
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="row my-3">

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-name">Nom</label>
                            <div class="col-sm-4 mt-3">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="basic-default-name" />
                                @error('nom')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-name">Prénom</label>
                            <div class="col-sm-4 mt-3">
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror"  name="prenom" id="basic-default-name" />
                                @error('prenom')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <label for="exampleFormControlSelect1" class="col-sm-2 mt-3 col-form-label">Pays</label>
                            <div class="col-sm-4 mt-3">
                                <select class="form-select @error('pays') is-invalid @enderror" name="pays" id="exampleFormControlSelect1" >
                                    <option selected disabled>Choisir un pays</option>
                                    @foreach($pays as $p)
                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>

                                @error('pays')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            
                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-company">Date de naissance</label>
                            <div class="col-sm-4 mt-3">
                                <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" id="basic-default-company"/>
                                @error('date_naissance')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-company">genre</label>
                            <div class="col-sm-10 mt-3">
                                <input name="genre" class="mt-1" type="radio" value="Femme" id="genre"/>
                                <label class="form-check-label mt-1" for="genre"> Femme </label>
                                <input name="genre" class="ml-5 mt-1" type="radio" value="Homme" id="genre"/>
                                <label class="form-check-label mt-1" for="genre"> Homme </label>
                                @error('genre')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Email</label>
                            <div class="col-sm-4 mt-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="basic-default-email" name="email" class="form-control"/>
                                @error('email')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Téléphone</label>
                            <div class="col-sm-4 mt-3">
                                <input type="tel" id="basic-default-email" class="form-control @error('tel') is-invalid @enderror" name="tel" class="form-control"/>
                                @error('tel')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Mot de passe</label>
                            <div class="col-sm-4 mt-3">
                                <input type="password" id="basic-default-email" class="form-control @error('password') is-invalid @enderror" name="password" class="form-control"/>
                                @error('password')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Confirmation</label>
                            <div class="col-sm-4 mt-3">
                                <input type="password" id="basic-default-email" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" class="form-control"/>
                                @error('password_confirmation')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-3 mt-3 col-form-label" for="basic-default-company" style="font-weight:initial;font-size:14px!important">Ajouter un utilisateur en tant que:</label>
                            <div class="col-sm-8 mt-3">
                                <input name="role" class="mt-1" type="radio" value="client" id="role"/>
                                <label class="form-check-label mt-1" for="role"> Client </label>
                                <input name="role" class="ml-3 mt-1" type="radio" value="prestataire" id="role"/>
                                <label class="form-check-label mt-1" for="role"> Prestataire </label>
                                @error('role')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 mt-5">
                                <button type="submit" class="primary-btn">Ajouter</button>
                            </div>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
          </div>
          <!-- Content wrapper -->
@endsection