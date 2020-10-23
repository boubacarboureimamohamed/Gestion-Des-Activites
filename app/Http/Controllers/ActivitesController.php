<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Bailleur;
use App\Models\LigneActivite;
use App\Models\Budget;
use App\Models\PlanAction;
use App\Models\ProjetMiseEnOeuvre;
use App\Models\ActiviteBailleur;

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
        $plan_actions = PlanAction::all();
        $projet_mises_en_oeuvres = ProjetMiseEnOeuvre::all();
        $ligne_activites = LigneActivite::all();
        return view('activites.create', compact('bailleurs', 'ligne_activites', 'plan_actions', 'projet_mises_en_oeuvres'));
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
            'budget_id'=>$budget->id
        ]);


        for($i=0; $i< count($request->ligne_activite_id); $i++)
        {
          ActiviteLigneActivite::create([
                'montant_prevu'=>$request->montant_prevu[$i],
                'ligne_activite_id'=>$request->ligne_activite_id[$i],
                'activite_id'=>$activite->id
            ]);
        }

        for($j=0; $j< count($request->bailleur_id); $j++)
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
        $user = auth()->user();
        $x = 0;
        $mail_admin = 0;
        foreach($user->roles as $role)
            {
                if($role->name == 'Admin')
                    {
                        $x  = $user->email;
                    }
            }
            $mail_admin = $x;
        $activite = Activite::find($id);
        $ligne_activites = ActiviteLigneActivite::where('activite_id', '=', $activite->id)->get();
        $budget = Budget::where('id', '=', $activite->budget_id)->orderByDesc('date_budget')->first();
        return view('activites.show', compact('activite', 'ligne_activites', 'budget', 'user', 'mail_admin'));
    }

    public function show_activite($id)
    {
        $activite = Activite::find($id);
        $ligne_activites = ActiviteLigneActivite::where('activite_id', '=', $activite->id)->get();
        $bailleurs = ActiviteBailleur::where('activite_id', '=', $activite->id)->get();
        $budget = Budget::where('id', '=', $activite->budget_id)->orderByDesc('date_budget')->first();
        return view('activites.show_activite', compact('activite', 'ligne_activites', 'bailleurs', 'budget'));
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
        $projet_mises_en_oeuvres = ProjetMiseEnOeuvre::where('plan_action_id', '=', $plan_action_id)->get();
        return json_encode([
            'projet_mises_en_oeuvres'=>$projet_mises_en_oeuvres
        ]);
    }
}
