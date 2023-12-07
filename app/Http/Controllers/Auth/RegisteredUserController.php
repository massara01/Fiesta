<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Pays;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pays=Pays::all();
        return view('auth.register',compact('pays'));
    }

    
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'pays' => ['required',],
            'nom' => ['required', 'string', 'max:255'],
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

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'id_pays' => $request->pays,
            'date_naiss' => $request->date_naissance,
            'genre' => $request->genre,
            'role' => $request->role,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('get.user.account');
    }
}
