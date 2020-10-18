<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneActivite;
use Illuminate\Http\JsonResponse;

class LigneActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligne_activites = LigneActivite::all();
        return view('ligne_activites.index', compact('ligne_activites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ligne_activites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'nom_ligne_activite'=>'required'
        ]);

        LigneActivite::create([
            'nom_ligne_activite'=>$request->nom_ligne_activite
        ]);

        return redirect(route('ligne_activites.index'))->with('success', 'Operation effectuée avec success!');
    }

    public function addLigne_activite(Request $request)
    {
        $this->validate($request, [

            'nom_ligne_activite'=>'required',
            'nom_responsable_ligne'=>'required',
            'mail_responsable_ligne'=>'required',
            'contact_responsable_ligne'=>'required'
        ]);
        LigneActivite::create([
            'nom_ligne_activite'=>$request->nom_ligne_activite,
            'nom_responsable_ligne'=>$request->nom_responsable_ligne,
            'mail_responsable_ligne'=>$request->mail_responsable_ligne,
            'contact_responsable_ligne'=>$request->contact_responsable_ligne
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ligne_activite = LigneActivite::find($id);
        return view('ligne_activites.edit', compact('ligne_activite'));
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
        $this->validate($request, [

            'nom_ligne_activite'=>'required',
            'nom_responsable_ligne'=>'required',
            'mail_responsable_ligne'=>'required',
            'contact_responsable_ligne'=>'required'
        ]);

        $ligne_activite = LigneActivite::find($id);

        $ligne_activite->update([
            'nom_ligne_activite'=>$request->nom_ligne_activite,
            'nom_responsable_ligne'=>$request->nom_responsable_ligne,
            'mail_responsable_ligne'=>$request->mail_responsable_ligne,
            'contact_responsable_ligne'=>$request->contact_responsable_ligne
        ]);

        return redirect(route('ligne_activites.index'))->with('success', 'Operation effectue avec success!');

    }

    public function modifier_ligneActivite(Request $request, LigneActivite $ligne_activite)
    {
        $this->validate($request, [

            'nom_ligne_activite'=>'required',
        ]);
        $ligne_activite->update([
            'nom_ligne_activite'=>$request->nom_ligne_activite
        ]);

        return redirect(route('ligne_activites.index'))->with('success', 'Opération effectuée avec success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ligne_activite= LigneActivite::with('activities')->find($id);

        if($ligne_activite->activities)
        {
            return redirect(route('ligne_activites.index'))->with('error', 'Vous ne pouvez pas supprimer cette ligne car elle est a au moins une activite!');
        }
        LigneActivite::destroy($id);
        return redirect(route('demandeurs.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
