<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Justification;
use App\Models\Activite;
use App\Models\LigneActivite;

class JustificationController extends Controller
{
    public function interfacejustification()
    {
        $activites = Activite::all();
        $ligne_activites = LigneActivite::all();
        return view('justifications.justification', compact('activites', 'ligne_activites'));
    }

    public function ligne_activite_justifier()
    {

    }

    public function justification($id, Activite $activite)
    {
        $montant_depense = 0;
        $mp = 0;
        $ligne_activite = LigneActivite::where('activite_id', '=', $activite->id)->find($id);
        $justifications = Justification::where('ligne_activite_id', '=', $ligne_activite->id)->get();
        foreach($justifications as $justification)
        {
            $mp = $mp + $justification->montant_depense;
        }
        $montant_depense = $mp;
        return view('justifications.create', compact('activite', 'ligne_activite', 'justifications', 'montant_depense'));
    }


    public function justification_store(Request $request)
    {
        //dd($request->all());
        for($i=0; $i< count($request->libelle); $i++)
        {
            Justification::create([
                'libelle'=>$request->libelle[$i],
                'montant_depense'=>$request->montant_depense[$i],
                'piece_jointe'=>$request->piece_jointe[$i]->storePublicly('Piece_Jointes', ['disk' => 'public']),
                'ligne_activite_id'=>$request->ligne_activite_id
            ]);
        }
        return redirect()->back();
    }

}
