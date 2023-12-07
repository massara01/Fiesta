@extends('layouts.app')
@section('title', 'SHOPPINGCART')
@section('content')

<style>
    .sticky-header-section{
        background-color:#333333!important
    }
    .default-header-p {
        padding-top: 110px!important;
    }
</style>
<head>
<meta charset="UTF-8">
<link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
  crossorigin="anonymous">
<link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<!-- breadcrumb-section - start
================================================== -->
<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
        <form accept-charset="UTF-8" action="/" class="require-validation"
          data-cc-on-file="false"
          data-stripe-publishable-key="pk_test_51MwBgHKZFpVUpDoUn8EwTXqUAT3cuL81I8nI41PiIhuUL5aIDIg9jjUdO5bvq2b8eFyAX83B3kvEqw4WJYtk7gEm008so1lZaW"
          id="payment-form" method="post">
          @csrf
    <section id="breadcrumb-section" class="breadcrumb-section clearfix default-header-p">
    <div class="jarallax" style="background-image: url({{asset('assets/images/breadcrumb/0.breadcrumb-bg.jpg')}});">
        <div class="overlay-black">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">

                        <!-- breadcrumb-title - start -->
                        <div class="breadcrumb-title text-center mb-50">
                            <h2 class="big-title">Paiement <strong>La Fiesta</strong></h2>
                        </div>
                        <!-- breadcrumb-title - end -->

                        <!-- breadcrumb-list - start -->
                        <div class="breadcrumb-list">
                            <ul>
                                <li class="breadcrumb-item"><a href="index-1.html" class="breadcrumb-link">Acceuil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Paiment</li>
                            </ul>
                        </div>
                        <!-- breadcrumb-list - end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        
        <div class="checkout__form">
            <h1><strong>Détails de la facturation </strong></h1>
          <br>
            <form action="#">
                    <div class="row">
                      <div class="col-lg-8 col-md-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="name" value="{{Auth::user()->nom}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="prenom" value="{{Auth::user()->prenom}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" value="{{Auth::user()->email}}" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class='checkout__input card required' style="border:none!important;">
                              <p>Numéro de carte<span>*</span></p>
                              <input autocomplete='off' class='form-control card-number' size='20' type='text' placeholder="Entrer votre numéro de carte" name="numCard">
                            </div>
                          </div>
                        </div>
                        <div class='row'>
                          <div class="col-md-4">
                            <div class='checkout__input cvc required'>
                              <p>CVC<span>*</span></p>
                              <input  autocomplete='off' class='form-control card-cvc' placeholder='CVC' size='4' type='text' name='cvc'>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class='checkout__input expiration required'>
                              <p>Mois d'expiration<span>*</span></p>
                              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class='checkout__input expiration required'>
                              <p>Année d'expiration<span>*</span></p>
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                          </div>
                        </div>
                        <input type='hidden' name="sum" value="{{Cart::subtotal()}}">
                        <div class="row">
                          <div class="col-lg-12">
                            <button class='custom-btn' type='submit' style="margin-top: 10px;">Confirmer</button>
                          </div>
                        </div>
                        <div class="row">
                          <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class='col-md-12  form-group hide'>
                            @if ((Session::has('success-message')))
                              <div class="alert alert-success col-md-12">{{Session::get('success-message') }}</div>
                            @endif @if ((Session::has('fail-message')))
                              <div class="alert alert-danger col-md-12">{{Session::get('fail-message') }}</div>
                            @endif                          
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Votre Panier</h4>
																	@foreach($cartItems as $cartItem)
																	@if($cartItem->options->type == 'service')
																	<div class="listchek">
																		<img style="width:60px;float:left; margin-right:10px;" src="{{ asset('/public/assets/images/'.$cartItem->options->image) }}" alt="Image_not_found">
																		
																		<strong><span>{{$cartItem->qty}} x {{ $cartItem->name}}</span></strong><br>
																		{{ $cartItem->qty*$cartItem->price}}DT

																	</div>
                                  <br>
																	@elseif($cartItem->options->type=="pack")
																	<div class="listchek">
																		<span style="width:60px;float:left; margin-top:10px; margin-right:10px;"> <strong>Pack:</strong></span>
																

																		<strong><span style="">{{$cartItem->qty}} x {{ $cartItem->name}}</span></strong><br>
																		{{ $cartItem->price}}DT Remise de {{$cartItem->options->remise}}% 

																	</div>
																	@endif
																	@endforeach
															<br>
                            <div class="checkout__order__total">Total <span>{{Cart::subtotal()}}DT</span></div>
                            
                        </div>
                    </div>  
                    </div>
            
            </form>
          </div>
        
    </div>
        
      </div>
      <div class='col-md-4'></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"
    integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
    crossorigin="anonymous"></script>
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
    crossorigin="anonymous"></script>
  <script>
    $(function() {
        $('form.require-validation').bind('submit', function(e) {
          var $form         = $(e.target).closest('form'),
              inputSelector = ['input[type=email]', 'input[type=password]',
                               'input[type=text]', 'input[type=file]',
                               'textarea'].join(', '),
              $inputs       = $form.find('.required').find(inputSelector),
              $errorMessage = $form.find('div.error'),
              valid         = true;

          $errorMessage.addClass('hide');
          $('.has-error').removeClass('has-error');
          $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
              $input.parent().addClass('has-error');
              $errorMessage.removeClass('hide');
              e.preventDefault(); // cancel on first error
            }
          });
        });
      });

      $(function() {
        var $form = $("#payment-form");

        $form.on('submit', function(e) {
          if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
              number: $('.card-number').val(),
              cvc: $('.card-cvc').val(),
              exp_month: $('.card-expiry-month').val(),
              exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
          }
        });

        function stripeResponseHandler(status, response) {
          if (response.error) {
            $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
          } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            console.log(token);
            $form.get(0).submit();
          }
        }
      })
    </script>
    </form>
    </form>
</body>
</html>

           

        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection