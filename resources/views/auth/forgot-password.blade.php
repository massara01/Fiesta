@extends('layouts.auth')
@section('title', 'MOT DE PASSE OUBLIE')
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
                <h1 class="mb-5">Mot de passe Oublié !</h1>

                <!-- Status message -->
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <input type="email" class="@error('email') is-invalid @enderror" name="email"  value="{{old('email')}} " placeholder="Email">
                    @error('email')
                        <span class="error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <button type="submit" class="mt-2">Continuer</button>
                </form>	        
                </div>	
            </div>
        </div>
        <div class="page front">
            <div class="content">
                <img src="../assets/images/Fiesta_B.png" class="img-fluid rounded-normal" style="width:150px" alt="logo"><br><br>
                <a href="{{route('login')}}"><button type="" id="register">Connectez-vous </button></a>
            </div>
        </div>
        
    @endsection