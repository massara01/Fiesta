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
                            <h2 class="big-title">Panier <strong>La Fiesta</strong></h2>
                        </div>
                        <!-- breadcrumb-title - end -->

                        <!-- breadcrumb-list - start -->
                        <div class="breadcrumb-list">
                            <ul>
                                <li class="breadcrumb-item"><a href="index-1.html" class="breadcrumb-link">Acceuil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Panier</li>
                            </ul>
                        </div>
                        <!-- breadcrumb-list - end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shoping__cart__table">
                    <h2>Services</h2>
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Services</th>
                                <th style="text-align: left!important">Adresse</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Totale</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cartItems as $cartItem)
                            @if($cartItem->options->type == 'service')
                            <tr>
                                <td class="shoping__cart__item">
                                    <img style="width:20%;float:left;margin-right:10px;" src="{{asset('/public/assets/images/'.$cartItem->options->image)}}" alt="">
                                    <h5 style="margin-top: 8px">{{$cartItem->name}}</h5>
                                </td>
                                <td class="shoping__cart__item ">
                                    {{$cartItem->options->adress}}
                                </td>
                                <td class="shoping__cart__price">
                                    {{$cartItem->price}}DT
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <span class="dec qtybtn prod{{$cartItem->id}}">-</span>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="text" name="qty" id="qty{{$cartItem->id}}" value="{{$cartItem->qty}}">
                                            <span class="inc qtybtn prod{{$cartItem->id}}">+</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{$cartItem->qty * $cartItem->price}}DT
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        
                                        <button class="btn-delete"  type="submit" > <span class="icon_close"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                           
                        </tbody>
                    </table>

                    <h2 class="mt-5">Packs</h2>
                    <table class="mt-2">
                        <thead>
                            <tr>
                                <th class="shoping__product">Packs</th>
                                <th style="text-align: left!important">Services Associés</th>
                                <th style="text-align: left!important">Remise</th>
                                <th>Totale</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $cartItem)
                            @if($cartItem->options->type == 'pack')

                            <tr>
                                <td class="shoping__cart__item">
                                    <h5>{{$cartItem->name}}</h5>
                                </td>
                                <td class="shoping__cart__item">
                                    
                                    @foreach($cartItem->options->services as $service)
                                        {{$service->name}} <br>
                                    @endforeach
                                </td>
                                <td class="shoping__cart__price">
                                    {{$cartItem->options->remise}}%
                                </td>
                                
                                <td class="shoping__cart__total">
                                    {{$cartItem->qty * $cartItem->price}}DT
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        
                                        <button class="btn-delete"  type="submit" > <span class="icon_close"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="shoping__checkout" style="margin-top: 0px">
                    <h5>Totale:</h5>
                    <ul>
                        <li>Totale <span>{{Cart::subtotal()}} DT</span></li>
                    </ul>
                    <div style="text-align:center">
                        <a href="{{route('checkout')}}" class="about-btn custom-btn">Passer au paiement</a>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection

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