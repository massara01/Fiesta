@extends('layouts.auth')
@section('title', 'REINITIALISER LA MOT DE PASSE')
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
                <h1 class="mb-5">Réinitialiser votre mot de passe !</h1>

                <!-- Status message -->
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <input type="email" class="@error('email') is-invalid @enderror" name="email"  value="{{old('email')}} " placeholder="Email">
                    @error('email')
                        <span class="error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Mot de passe">
                    @error('password')
                        <span class="error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <input type="password" name="password_confirmation" placeholder="Confirmation de mot de passe">

                    <br>
                    <button type="submit" class="mt-2">Réinitialiser</button>
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