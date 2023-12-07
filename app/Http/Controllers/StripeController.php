<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Stripe;
use Session;

class StripeController extends Controller
{
    //
   
    public function call(Request $request) {
        $cartItems=Cart::content();
   
        \Stripe\Stripe::setApiKey('sk_test_51MwBgHKZFpVUpDoUMs53mPSRYTl26nfVYWf17U9ztuIEtBWFkqe99pxJ44SkOHjUnhMqsQW3bOc2OrBHCULMS7PF00BQG0HjH9');
        $customer = \Stripe\Customer::create(array(
          'name' => $request->name,
          'description' => $request->description,
          'email' => $request->email,
          'source' => $request->input('stripeToken'),
        ));

        $Reservation = new Reservation;
        $Reservation ->date = now();
        $Reservation ->prix= intval(str_replace(',', '',$request->sum ));
        $Reservation ->email= $request->email;
       
        $service=collect($cartItems)
        ->map(function ($item) {
            if($item->options->type == 'service')
                return [
                    'name' => $item->name,
                    'price' => $item->price,
                    'qty' => $item->qty,
                ];
                else
                return [
                    'name' => "",
                    'price' => "",
                    'qty' => "",
                ];
            
        })->toArray();

        $pack=collect($cartItems)
        ->map(function ($item) {
            if($item->options->type == 'pack')
                return [
                    'name' => $item->name,
                    'price' => $item->price,
                    'remise' => $item->options->remise,
                    'service'=> $item->options->services,
                ];
                else
                return [
                    'name' => "",
                    'price' => "",
                    'remise' => "",
                    'service'=> "",
                ];
            
        })->toArray();

        $Reservation->services = serialize($service);
        $Reservation->packs = serialize($pack);

        $Reservation ->save();
        try {
            \Stripe\Charge::create ( array (
                    "amount" => intval(str_replace(',', '',$request->sum )) ,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" => "  Votre paiement est realisé avec succées."
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            Cart::destroy();
            return redirect('/Reservation');
        } catch ( \Stripe\Error\card $e ) {
            Session::flash ( 'fail-message', $e->get_message() );
            return view ( 'cardForm' );
        }

    }

  


   

}
