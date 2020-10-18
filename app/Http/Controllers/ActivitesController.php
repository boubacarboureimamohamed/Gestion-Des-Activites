<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Bailleur;
use App\Models\LigneActivite;
use App\Models\ResponsableActivite;
use App\Models\Demandeur;

class ActivitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = Activite::all();
        return view('activites.index', compact('activites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responsable_activites = ResponsableActivite::all();
        $bailleurs = Bailleur::all();
        $demandeurs = Demandeur::all();
        $ligne_activites = LigneActivite::all();
        return view('activites.create', compact('bailleurs', 'demandeurs', 'ligne_activites', 'responsable_activites'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [

            'nom_activite'=>'required',
            'date_debut_activite'=>'required|date',
            'date_fin_activite'=>'required|date',
            'demandeur_id'=>'required',
            'responsable_activite_id'=>'required',
            'montant_annonce'=>'required',
            'nom_responsable'=>'required',
            'mail_responsable'=>'required',
            'contact_responsable'=>'required'
        ]);
        
        $activite = Activite::create([
            'nom_activite'=>$request->nom_activite,
            'date_debut_activite'=>$request->date_debut_activite,
            'date_fin_activite'=>$request->date_fin_activite,
            'commentaire_activite'=>$request->commentaire_activite,
            'piece_jointe'=>$request->piece_jointe,
            'demandeur_id'=>$request->demandeur_id,
            'responsable_activite_id'=>$request->responsable_activite_id
        ]);

        for($i=0; $i< count($request->ligne_activite_id); $i++)
        {
            $activite->ligneActivites()->attach($request->ligne_activite_id[$i], [
                'montant_prevu'=>$request->montant_prevu[$i],
                'nom_responsable'=>$request->nom_responsable[$i],
                'mail_responsable'=>$request->mail_responsable[$i],
                'contact_responsable'=>$request->contact_responsable[$i],
            ]);
        }

        for($j=0; $j< count($request->bailleur_id); $j++)
        {
            $activite->bailleurs()->attach($request->bailleur_id[$j], [
                'montant_annonce'=>$request->montant_annonce[$j]
            ]);
        }

        return redirect(route('activites.index'))->with('success', 'Operation effectue avec success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $activite = Activite::find($id);
        return view('activites.show', compact('activite', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = Activite::with('responsableActivite', 'ligneActivites', 'bailleurs', 'demandeur')->find($id);
        $responsable_activites = ResponsableActivite::all();
        $demandeurs = Demandeur::all();
        $ligne_activites = LigneActivite::all();
        $bailleurs = Bailleur::all();
        return view('activites.edit', compact('activite', 'responsable_activites', 'demandeurs', 'ligne_activites', 'bailleurs'));
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

            'nom_activite'=>'required',
            'date_debut_activite'=>'required|date',
            'date_fin_activite'=>'required|date',
            'demandeur_id'=>'required',
            'responsable_activite_id'=>'required',
            'montant_annonce'=>'required',
            'nom_responsable'=>'required',
            'mail_responsable'=>'required',
            'contact_responsable'=>'required'
        ]);

        $activite = Activite::find($id);
        $activite->update([
            'nom_activite'=>$request->nom_activite,
            'date_debut_activite'=>$request->date_debut_activite,
            'date_fin_activite'=>$request->date_fin_activite,
            'commentaire_activite'=>$request->commentaire_activite,
            'piece_jointe'=>$request->piece_jointe,
            'demandeur_id'=>$request->demandeur_id,
            'responsable_activite_id'=>$request->responsable_activite_id
        ]);

        for($i=0; $i< count($request->ligne_activite_id); $i++)
        {
            $activite->ligneActivites()->updateExistingPivot($request->ligne_activite_id[$i], [
                'montant_prevu'=>$request->montant_prevu[$i],
                'nom_responsable'=>$request->nom_responsable[$i],
                'mail_responsable'=>$request->mail_responsable[$i],
                'contact_responsable'=>$request->contact_responsable[$i],
            ]);
        }

        for($j=0; $j< count($request->bailleur_id); $j++)
        {
            $activite->bailleurs()->updateExistingPivot($request->bailleur_id[$j], [
                'montant_annonce'=>$request->montant_annonce[$j]
            ]);
        }

        return redirect(route('activites.index'))->with('success', 'Operation effectue avec success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getData()
    {

        $bailleurs = Bailleur::all();
        $demandeurs = Demandeur::all();
        $ligne_activites = LigneActivite::all();
        $responsable_activites = ResponsableActivite::all();
        return json_encode([
            'bailleurs'=>$bailleurs,
            'demandeurs'=>$demandeurs,
            'ligne_activites'=>$ligne_activites,
            'responsable_activites'=>$responsable_activites
        ]);
    }
}
