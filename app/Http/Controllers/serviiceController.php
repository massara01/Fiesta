<?php

namespace App\Http\Controllers;
use App\Models\TypeService;
use App\Models\serviice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\temoignage;


class serviiceController extends Controller
{

    //show services
    public function list()
    {
        $services=Serviice::orderBy('id', 'desc')->get();
        return view ('service/listServices',['LServices'=>$services]);
    }

    public function list_back()
    {
        $services=Serviice::orderBy('id', 'desc')->get();
        return view ('/back/service/list',['services'=>$services]);
    }

    //show services
    public function detailsService($id)
    {
        $service=Serviice::find($id);
        $temoignages=temoignage::where('serviceID',$id)->where('status','validé')->orderBy('created_at', 'desc')->get();
        return view ('service/details-service',compact('service','temoignages'));
    }

   //show services by prestataire
    public function showByUser(){
        $user=User::with('Pays')->find(Auth::user()->id); 
        $services=Serviice::with('pack')->where('id_user',Auth::user()->id)->get();
        return view('service.listByUser',compact('services','user'));
    }

    //show add service form
    public function store(){
        $user=User::with('Pays')->find(Auth::user()->id); 
        $typesS=TypeService::all();
        return view('service.add',compact('typesS','user'));
    }

    //show add service form
    public function store_back(){
        $users=User::where('role','prestataire')->get();
        $typesS=TypeService::all();
        return view('back.service.add',compact('typesS','users'));
    }

    //add service
    public function create(Request $req)
    {
        $service = new serviice;

        $service->name = $req->name;
        $service->price = $req->price;
        $service->adress = $req->adress;
        $service->description = $req->description;
        $service->typename= $req->typename;  
        $service->id_user=Auth::user()->id;
        $filename = $req->image->getClientOriginalName();
        $service->image= $filename;
        $req->image->move('public/assets/images/',$filename);

        $filename1 = $req->image360->getClientOriginalName();
        $service->image360= $filename1;
        $req->image360->move('public/assets/images/',$filename1);
        //$path = $req->image->storeAs('public/images', $filename);

        $service->save();

        return redirect('listservice')
        ->with('success', 'service ajouté avec succés');

    }

    public function create_back(Request $req)
    {
        $service = new serviice;

        $service->name = $req->name;
        $service->price = $req->price;
        $service->adress = $req->adress;
        $service->description = $req->description;
        $service->typename= $req->types;  
        $service->id_user=$req->id_user;
        $filename = $req->image->getClientOriginalName();
        $service->image= $filename;
        $req->image->move('public/assets/images/',$filename);

        $filename1 = $req->image360->getClientOriginalName();
        $service->image360= $filename1;
        $req->image360->move('public/assets/images/',$filename1);
        //$path = $req->image->storeAs('public/images', $filename);

        $service->save();

        return redirect()->route('list.admin.services')
        ->with('success', 'Service ajouté avec succés');

    }

    //show add service form
    public function edit_back($id){
        $users=User::where('role','prestataire')->get(); 
        $service = $service=Serviice::find($id);
        $typesS=TypeService::all();
        return view('back.service.update',compact('typesS','users','service'));
    }

    public function update_back(Request $req,$id)
    {
        $service = Serviice::find($id);

        if(!empty($req->image))
            $filename = $req->image->getClientOriginalName();
        else
            $filename = $service->image;

        if(!empty($req->image360))
            $filename1 = $req->image360->getClientOriginalName();
        else
            $filename1 = $service->image360;
     
        $service->update([
            'name' => $req->name,
            'price' => $req->price,
            'adress' => $req->adress,
            'description' => $req->description,
            'typename' => $req->typename,
            'id_user' => $req->id_user,
            'image' => $filename,
            'image360' => $filename1
        ]);

        if(!empty($req->image))
            $req->image->move('public/assets/images/',$filename);
        if(!empty($req->image360))
            $req->image->move('public/assets/images/',$filename1);

        return redirect()->route('list.admin.services')
        ->with('success', 'Service ajouté avec succés');

    }

    public function destroy($id)
    {
        $service=Serviice::find($id);

        $service->delete();
    
        return redirect()->route('list.admin.services')
                        ->with('success','Utilisateur supprimé avec succèss');
    }
    
}
