<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Bailleur;
use App\Models\LigneActivite;
use App\Models\Budget;
use App\Models\Beneficiaire;
use App\Models\Departement;
use App\Models\Direction;
use App\Models\PlanAction;
use App\Models\ProjetMiseEnOeuvre;
use App\Models\ActiviteBailleur;
use App\Models\BeneficiaireLigneActivite;
use Illuminate\Support\Facades\DB;

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
        $bailleurs = Bailleur::all();
        $beneficiaires = Beneficiaire::all();
        $plan_actions = PlanAction::all();
        $projet_mises_en_oeuvres = ProjetMiseEnOeuvre::all();
        $ligne_activites = LigneActivite::all();
        $departements = Departement::all();
        $directions = Direction::all();
        return view('activites.create', compact('bailleurs', 'ligne_activites', 'plan_actions', 'projet_mises_en_oeuvres', 'beneficiaires', 'departements', 'directions'));
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
            'montant_annonce'=>'required'
        ]);

        $budget = Budget::create([
            'montant_budget'=>$request->montant_budget,
            'date_budget'=>date('Y-m-d')
        ]);

        $activite = Activite::create([
            'nom_activite'=>$request->nom_activite,
            'date_debut_activite'=>$request->date_debut_activite,
            'date_fin_activite'=>$request->date_fin_activite,
            'commentaire_activite'=>$request->commentaire_activite,
            'piece_jointe'=>$request->piece_jointe->storePublicly('Piece_Jointes', ['disk' => 'public']),
            'projet_mise_en_oeuvre_id'=>$request->projet_mise_en_oeuvre_id,
            'budget_id'=>$budget->id
        ]);


        for($i=0; $i< count($request->nom_ligne_activite); $i++)
        {
            if( (isset($request->bailleur_ligne_activite)  && array_key_exists($i, $request->bailleur_ligne_activite)) &&  (isset($request->quantite_ligne_activite) && array_key_exists($i, $request->quantite_ligne_activite))) 
           {
                $ligne_activite = LigneActivite::create([
                    'nom_ligne_activite'=>$request->nom_ligne_activite[$i],
                    'quantite_ligne_activite'=>$request->quantite_ligne_activite[$i],
                    'montant_ligne_activite'=>$request->montant_ligne_activite[$i],
                    'bailleur_ligne_activite'=>$request->bailleur_ligne_activite[$i],
                    'activite_id'=>$activite->id
                ]);
            }
            else
            {
                $ligne_activite = LigneActivite::create([
                    'nom_ligne_activite'=>$request->nom_ligne_activite[$i],
                    'montant_ligne_activite'=>$request->montant_ligne_activite[$i],
                    'activite_id'=>$activite->id,
                    'bailleur_ligne_activite'=>null,
                    'quantite_ligne_activite'=>null,
                ]);
            }

            for($r=0; $r<count($request->beneficiaire_id[$i]); $r++)
            {
                BeneficiaireLigneActivite::create([
                    'beneficiaire_id'=>$request->beneficiaire_id[$i][$r],
                    'ligne_activite_id'=>$ligne_activite->id
                ]);
            }

        }

        for($j=0; $j< count($request->montant_annonce); $j++)
        {
            ActiviteBailleur::create([
                'montant_annonce'=>$request->montant_annonce[$j],
                'bailleur_id'=>$request->bailleur_id[$j],
                'activite_id'=>$activite->id
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
        $somme_montant_prevu = 0;
        $mp = 0;
        $activite = Activite::find($id);
        $ligne_activites = LigneActivite::where('activite_id', '=', $activite->id)->get();
        $budget = Budget::where('id', '=', $activite->budget_id)->orderByDesc('date_budget')->first();
        foreach($ligne_activites as $ligne_activite)
        {
            $mp = $mp + $ligne_activite->montant_ligne_activite;
        }
        $somme_montant_prevu = $mp;
        return view('activites.show', compact('activite', 'ligne_activites', 'budget', 'somme_montant_prevu'));
    }

    public function show_activite($id)
    {
        $gap  = 0;
        $sm = 0;
        $somme_montant = 0;
        $activite = Activite::find($id);
        $ligne_activites = LigneActivite::where('activite_id', '=', $activite->id)->get();
       // dd($ligne_activites);
        $bailleurs = ActiviteBailleur::where('activite_id', '=', $activite->id)->get();
        $budget = Budget::where('id', '=', $activite->budget_id)->orderByDesc('date_budget')->first();
        $ptfs = Budget::all();
        foreach($bailleurs as $bailleur)
        {
            $sm = $sm + $bailleur->montant_annonce;
        }
        $somme_montant = $sm;
        $gap = $budget->montant_budget - $somme_montant;
        return view('activites.show_activite', compact('activite', 'ligne_activites', 'bailleurs', 'budget', 'somme_montant', 'gap', 'ptfs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = Activite::with('ligneActivites', 'bailleurs', 'demandeur')->find($id);
        $ligne_activites = LigneActivite::all();
        $bailleurs = Bailleur::all();
        return view('activites.edit', compact('activite', 'ligne_activites', 'bailleurs'));
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
            'montant_annonce'=>'required',
        ]);

        $activite = Activite::find($id);
        $activite->update([
            'nom_activite'=>$request->nom_activite,
            'date_debut_activite'=>$request->date_debut_activite,
            'date_fin_activite'=>$request->date_fin_activite,
            'commentaire_activite'=>$request->commentaire_activite
        ]);

        if($request->piece_jointe)
        {
            $activite->update([
                'piece_jointe'=>$request->piece_jointe->storePublicly('Piece_Jointes', ['disk' => 'public']),
            ]);
        }

        for($i=0; $i< count($request->ligne_activite_id); $i++)
        {
            $activite->ligneActivites()->updateExistingPivot($request->ligne_activite_id[$i], [
                'montant_prevu'=>$request->montant_prevu[$i],
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

    public function show_beneficiaires_ligne(LigneActivite $ligne_activite)
    {
       $beneficiaires_lignes =  BeneficiaireLigneActivite::where('ligne_activite_id', '=', $ligne_activite->id)->get();
        return view('activites.show_beneficiares_ligne', compact('beneficiaires_lignes', 'ligne_activite'));
    }

    public function getData(Request $request)
    {
        $line_activite = $request->nom_activite;
        $bailleurs = Bailleur::all();
        $ligne_activites = LigneActivite::all();
        return json_encode([
            'bailleurs'=>$bailleurs,
            'ligne_activites'=>$ligne_activites,
            'line_activite'=>$line_activite
        ]);
    }
    
    public function getProjet(Request $request)
    {
        $plan_action_id = $request->plan_action_id;
        $direction_id = $request->direction_id;
        $departement_id = $request->departement_id;
        $projet_mises_en_oeuvres = ProjetMiseEnOeuvre::where('plan_action_id', '=', $plan_action_id)->get();
        $departements = Departement::where('direction_id', '=', $direction_id)->get();
        $beneficiaires = Beneficiaire::where('departement_id', '=', $departement_id)->get();
        return json_encode([
            'projet_mises_en_oeuvres'=>$projet_mises_en_oeuvres,
            'departements'=>$departements,
            'beneficiaires'=>$beneficiaires
        ]);
    }
}