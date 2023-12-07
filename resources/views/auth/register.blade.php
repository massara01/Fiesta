
@extends('layouts.auth')

@section('content') 
    <style>
        .error{
            color: rgb(136, 5, 5);
            font-size: 12.5px;
            margin-top: -8px;
        }
    </style>
    <div id="container">
		<div class="login">
			<div class="content">
            <div class="border">
               <h1 class="mb-5">Inscription</h1>
               <form method="POST" action="{{ route('register') }}" >
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="nom" id="nom" class="@error('nom') is-invalid @enderror" value="{{old('nom')}}" placeholder="Nom">
                        @error('nom')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="prenom"  class="@error('prenom') is-invalid @enderror"  value="{{old('prenom')}}" placeholder="Prénom">
                        @error('prenom')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <select name="pays" class="@error('pays') is-invalid @enderror">
                            <option selected disabled >Pays</option>
                            @foreach($pays as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                        @error('pays')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <div class="col-md-6">
                        <input type="date" name="date_naissance" class="@error('date_naissance') is-invalid @enderror"  value="{{old('date_naissance')}}" placeholder="Date de naissance">
                        @error('date_naissance')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                       
                            <label for="genre" >Genre:</label>
                            <input style="width:8%" type="radio" name="genre" id="femme" value="Femme"><label for="femme">Femme</label>
                            <input style="width:8%" type="radio" name="genre" id="homme" value="Homme"><label for="homme">Homme</label>
                            @error('genre')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email">
                        @error('email')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="tel" class="@error('tel') is-invalid @enderror" placeholder="Téléphone">
                        @error('tel')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Mot de passe">
                        @error('password')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password_confirmation" placeholder="Confirmation">
                    </div>

                    <div class="col-md-12">
                        <label for="role">S'inscrire en tant que :</label>
                        <input style="width:7%" type="radio" name="role" id="client" value="client"><label for="client">Client</label>
                        <input style="width:7%" type="radio" name="role" id="prestataire" value="prestataire"><label for="prestataire">Prestataire</label>
                        @error('role')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                 
                  </div>
               
                  <br>
                  <button type="submit" class="mt-2">Inscription</button>
               </form>	

            </div>	
			</div>
		</div>
		<div class="page front">
			<div class="content">
               <img src="../assets/images/Fiesta_B.png" class="img-fluid rounded-normal" style="width:150px" alt="logo">

					<p>Vous avez déja un compte ?</p>
					<a href="{{route('login')}}"><button type="" id="register">Connectez-vous </button></a>
			</div>
		</div>
      
   @endsection