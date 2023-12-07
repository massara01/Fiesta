@extends('layouts.auth')
@section('title', 'LOGIN')
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
                <h1 class="mb-5">Login</h1>

                 <!-- Status message -->
                 @if (session('status'))
                 <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                     </div>
                 @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" name="email"class="@error('email') is-invalid @enderror"  value="{{old('email')}} " placeholder="Email">
                    @error('email')
                      <span class="error">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Mot de passe">
                    @error('password')
                          <span class="error">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                    <br>
                    <button type="submit" class="mt-2">Login</button>
                </form>	
                <a style="margin:0!important" href="{{ route('password.request') }}"><span class="forget">Mot de passe oublié ?</span></a>
              </div>	
        </div>
      </div>
      <div class="page front">
        <div class="content">
                <img src="../assets/images/Fiesta_B.png" class="img-fluid rounded-normal" style="width:150px" alt="logo">

            <p>Vous n'avez pas encore de compte ?</p>
            <a href="{{route('register')}}"><button type="" id="register">Inscrivez-vous </button></a>
        </div>
      </div>
  </div>
  @endsection
   