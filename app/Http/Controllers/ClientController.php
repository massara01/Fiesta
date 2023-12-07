<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pays;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('Pays')->where('role','!=','admin')->get();   
        return view('back.users.list',compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user=User::with('Pays')->find(Auth::user()->id);   
        return view('front.client.account',compact('user'));
    }

    public function add()
    {
        $pays=Pays::all(); 
        return view('back.users.add',compact('pays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'pays' => ['required',],
            'date_naissance' => ['required'],
            'genre' => ['required'],
            'tel' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], 
        [

            'nom.required' => "Nom requis", 
            'prenom.required' => "Prénom requis",
            'pays.required' => "Pays requis",
            'date_naissance.required' => "Date de naissance requis",
            'genre.required' => "Genre requis",
            'tel.required' => "Numéro de téléphone requis",
            'role.required' => "role requis",
            'email.required' => "email requis",
            'email.email' => "Format de l'email incorrecte",
            'email.unique' => "Email existe déja !",
            'password.min' => "Le mot de passe doit comporter au moins 8 caractères",
            'password.comfirmed' => "La confirmation de mot de passe ne correspond pas",
          
        ]);

            
        $user=User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'id_pays' => $request->pays,
            'date_naiss' => $request->date_naissance,
            'genre' => $request->genre,
            'role' => $request->role,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password)
        ]);
        event(new Registered($user));

     
        return redirect()->route('list.admin.users')
                        ->with('success','Utilisateur ajouté avec succées.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user=User::with('Pays')->find(Auth::user()->id);  
        $pays=Pays::all(); 
        return view('front.client.edituser',compact('user','pays'));
    }

    public function edit_back($id)
    {
        $user=User::with('Pays')->find($id);  
        $pays=Pays::all(); 
        return view('back.users.update',compact('user','pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'pays' => ['required',],
            'date_naissance' => ['required'],
            'genre' => ['required'],
            'tel' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], 
        [

            'nom.required' => "Nom requis", 
            'prenom.required' => "Prénom requis",
            'pays.required' => "Pays requis",
            'date_naissance.required' => "Date de naissance requis",
            'genre.required' => "Genre requis",
            'tel.required' => "Numéro de téléphone requis",
            'email.required' => "email requis",
            'email.email' => "Format de l'email incorrecte",
            'email.unique' => "Email existe déja !",
          
        ]);

        $user=User::with('pays')->where('id',Auth::user()->id)->first();

        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'id_pays' => $request->pays,
            'date_naiss' => $request->date_naissance,
            'genre' => $request->genre,
            'email' => $request->email,
            'tel' => $request->tel,
        ]);
     
        return redirect()->route('get.user.account')
                        ->with('success','Votre compte est modifié avec succèss.');
    }


    public function update_back(Request $request,$id)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'pays' => ['required',],
            'date_naissance' => ['required'],
            'genre' => ['required'],
            'tel' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], 
        [

            'nom.required' => "Nom requis", 
            'prenom.required' => "Prénom requis",
            'pays.required' => "Pays requis",
            'date_naissance.required' => "Date de naissance requis",
            'genre.required' => "Genre requis",
            'tel.required' => "Numéro de téléphone requis",
            'role.required' => "role requis",
            'email.required' => "email requis",
            'email.email' => "Format de l'email incorrecte",
            'email.unique' => "Email existe déja !",
          
        ]);

            
        
        $user=User::with('pays')->where('id',$id)->first();

        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'id_pays' => $request->pays,
            'date_naiss' => $request->date_naissance,
            'genre' => $request->genre,
            'role' => $request->role,
            'email' => $request->email,
            'tel' => $request->tel,
        ]);
     
        return redirect()->route('list.admin.users')
                        ->with('success','Utlisateurs modifié avec succèss.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::where('id',$id)->first();

        $user->delete();
    
        return redirect()->route('list.admin.users')
                        ->with('success','Utilisateur supprimé avec succèss');
    }

}
