<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\serviice;
use App\Models\Abonnement;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems=Cart::content();
        return view('front.Cart.shoppingCart',compact('cartItems'));
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $service=serviice::find($id);
        Cart::add(['id' => $service->id,'name' => $service->name , 'qty' => 1,'price'=> $service->price,"options"=>['adress' => $service->adress, 'type'=>'service', 'image'=>$service->image]]);
        return back();
    }

    public function create_pack(Request $request,$id)
    {
        $pack=Abonnement::find($id);
        $total_pack=0;
        foreach($pack->services as $service)
            $total_pack=$total_pack+$service->price;
        $total_remise=$total_pack-($total_pack/100)*$pack->remise;

        Cart::add(['id' => $pack->idAb, 'name' => $pack->name , 'qty' => 1,'price'=> $total_remise,"options"=>['type'=>'pack','remise'=>$pack->remise,'services'=>$pack->services]]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cart::update($id,['qty'=>$request->qty]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
}