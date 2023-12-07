<?php

namespace App\Http\Controllers;
use App\Models\Abonnement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pays;
use Illuminate\Support\Facades\Auth;
use App\Models\serviice;


class ControllerAbonnement extends Controller
{
   
    public function index()
    {
        $Liste = Abonnement::all();
        $services = serviice::all();
        return view('front.packs.packs', ['packs' => $Liste,'services '=>$services ]);
    }

    public function index_back()
    {
        $Liste = Abonnement::all();
        $services = serviice::all();
   
        return view('back.pack.list', ['packs' => $Liste,'services '=>$services]);
    }

    public function add()
    {   
        $services = serviice::all();
        return view('back.pack.add',compact('services'));
    }

    public function store(Request $req)
    {    
        $Abonnement = new Abonnement;
        $Abonnement ->name = $req->name;
        $Abonnement ->description= $req->description;
        $Abonnement ->remise = $req->remise;

        $Abonnement ->save();

        $Abonnement->services()->attach($req->services);

        $services = serviice::all();
        $packs = Abonnement::all();

        return view('back.pack.list',compact('services','packs'))
            ->with('success', 'Abonnement ajouté avec succés');
    }

    public function Modifier($idAb)
    {   $data = Abonnement::find($idAb);
        return view ('ModifierAbonnement',['Abonnement'=> $data]);

    }

    public function edit($id)
    {   
        $services = serviice::all();
        $pack = Abonnement::where('idAb',$id)->first();
        return view('back.pack.update', compact('services','pack'));
    }
    public function update(Request $req,$id){

        $data = Abonnement::where('idAb',$id)->first();
        $data ->name = $req->name;
        $data ->description= $req->description;
        $data ->remise = $req->remise;
        $data ->save();

        $data->services()->sync($req->services);
        $pack = Abonnement::all();

        return redirect()->route('list.admin.packs', compact($pack))
            ->with('success', 'Modifier  avec succés');
    }

    function destroy($idAb)
    {
        $list = Abonnement::find($idAb);
        $list->delete();
        return redirect()->back()
        ->with('success', 'Abonnement supprimée avec succés');
    }


  
   


}