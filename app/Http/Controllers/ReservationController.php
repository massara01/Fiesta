<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pays;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function ListReservation()
    {
        $Liste1 = Reservation::all();
        $user=User::with('Pays')->find(Auth::user()->id);
       
        return view('listAb', ['reservation' => $Liste1,'user'=>$user]);
    }

    public function ListReservation_back()
    {
        $Liste1 = Reservation::all();
        $user=User::with('Pays')->find(Auth::user()->id);
       
        return view('back.reservation.list', ['reservations' => $Liste1,'user'=>$user]);
    }

    public function generatePDF($idR)
    {
        // Récupérez les informations du reçu à partir de la base de données ou d'une autre source de données
        $user=User::with('Pays')->find(Auth::user()->id);
       $reservation= Reservation::all();
            
          return view('Recu', ['user' => $user,'reservation'=>$reservation, 'idr'=>$idR]);
    }
   
}
