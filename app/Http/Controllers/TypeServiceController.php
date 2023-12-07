<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Illuminate\Http\Request;

class TypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=TypeService::all();
        return view ('back.categorie.list',['categories'=>$types]);
    }

    public function add()
    {
        return view ('back.categorie.add');
    }

    public function storee(Request $req)
    {
        $categorie = new TypeService;
        $categorie->typename = $req->typename;
        $categorie->save();

        return redirect()->route('list.admin.categories')
        ->with('success', 'catégorie ajouté avec succés');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $categorie = new TypeService;
        $categorie->typename = $req->nomC;
        $categorie->save();

        return redirect('/categorie')
        ->with('success', 'catégorie ajouté avec succés');
        
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeService  $typeService
     * @return \Illuminate\Http\Response
     */
    public function show(TypeService $typeService)
    {
        //
        $types=TypeService::all();
        return view ('add',['typesS'=>$types]);
    }

    public function list(TypeService $typeService)
    {
        //
        $types=TypeService::all();
        return view ('categorie/listC',['typesS'=>$types]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeService  $typeService
     * @return \Illuminate\Http\Response
     */
    public function edit($id,TypeService $typeService)
    {
        $data = TypeService::find($id);
        $types=TypeService::all();
        return view ('categorie/listC',['typesS'=>$types,'data'=>$data]);
    
    }
    public function edit2($id,Request $req)
    {
        $data = TypeService::find($id);
        $data ->typename = $req->nomC;
        $data ->save();

        return redirect('/categorie')
            ->with('success', 'Modifier  avec succés');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeService  $typeService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,TypeService $typeService)
    {
        $list = TypeService::find($id);
        $list->delete();
        return redirect('/categorie')
        ->with('success', 'categorie supprimée avec succés');
    }

    public function destroyy($id,TypeService $typeService)
    {
        $list = TypeService::find($id);
        $categories=TypeService::all();

        $list->delete();
        return redirect()->route('list.admin.categories',compact('categories'))
        ->with('success', 'categorie supprimée avec succés');
    }
}
