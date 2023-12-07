<?php

namespace App\Http\Controllers;

use App\Models\temoignage;
use Illuminate\Http\Request;

class temoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temoignages=temoignage::with('service')->get();
        return view ('back.temoignages.list',['temoignages'=>$temoignages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,Request $req)
    {
        $temoignage = new temoignage;

        $temoignage->userName = $req->userName;
        $temoignage->userEmail = $req->userEmail;
        $temoignage->contenu= $req->contenu;
        $temoignage->serviceID = $id;
        $temoignage->status = 'En Attente';
        if(!empty($req->rating))
            $temoignage->rating= count($req->rating);
        $temoignage->save();

        return redirect('/services/details/' . $id)
        ->with('success', 'temoignage ajouté avec succés');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show($id,temoignage $temoignage)
    {
        $temoignages=temoignage::where('serviceID',$id)->orderBy('created_at', 'desc')->paginate(2);
        return view ('temoignage',['Ltemoignages'=>$temoignages,'id'=>$id]);
        
    }


    public function validate_temoi($id)
    {
        $temoignage=temoignage::find($id);

        $temoignage->update([
            'status' => 'validé',
        ]);
        $temoignages=temoignage::with('service')->get();

        return redirect()->route('list.admin.temoignages',['temoignages'=>$temoignages]);

    }

    public function anuuler($id)
    {
        $temoignage=temoignage::find($id);

        $temoignage->update([
            'status' => 'Annuler',
        ]);
        $temoignages=temoignage::with('service')->get();

        return redirect()->route('list.admin.temoignages',['temoignages'=>$temoignages]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, temoignage $temoignage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy(temoignage $temoignage)
    {
        //
    }
}
