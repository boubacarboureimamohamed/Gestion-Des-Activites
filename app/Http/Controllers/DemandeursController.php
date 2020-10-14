<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Demandeur;
class DemandeursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandeurs = Demandeur::all();

    return view('demandeurs.index', compact('demandeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demandeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Demandeur::create([
            'nom_demandeur'=>$request->nom_demandeur
        ]);

        return redirect(route('demandeurs.index'))->with('success', 'Operation effectue avec success!');
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
        $demandeur = Demandeur::find($id);
        return view('demandeurs.edit', compact('demandeur'));
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
        $demandeur = Demandeur::find($id);
        $demandeur->update([
            'nom_demandeur'=>$request->nom_demandeur
        ]);
        return redirect(route('demandeurs.index'))->with('success', 'La modification a ete effectue avec success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demandeur= Demandeur::with('activities')->find($id);

        if($demandeur->activities)
        {
            return redirect(route('demandeurs.index'))->with('error', 'Vous ne pouvez pas supprimer ce demandeur car il a demande au moins une activite!');
        }
        Demandeur::destroy($id);
        return redirect(route('demandeurs.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
