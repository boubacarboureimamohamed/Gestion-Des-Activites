<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\Bailleur;
use App\Models\Budget;
use App\Models\Decaissement;
use App\Models\ActiviteBailleur;

class DecaissementController extends Controller
{
    public function interfacedecaissement()
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
        $activites = Activite::all();
        $bailleurs = ActiviteBailleur::all();
        return view('decaissements.decaissement', compact('activites', 'user', 'mail_admin', 'bailleurs'));
    }

    public function decaissement($id, Activite $activite)
    {
        $bailleur = ActiviteBailleur::where('activite_id', '=', $activite->id)->find($id);
        $decaissements = Decaissement::where('bailleur_id', '=', $bailleur->bailleur_id)->get();
        return view('decaissements.create', compact('bailleur', 'activite', 'decaissements'));
    }

    public function decaissement_store(Request $request)
    {
        for($i=0; $i< count($request->montant_decaisse); $i++)
        {
            Decaissement::create([
                'montant_decaisse'=>$request->montant_decaisse[$i],
                'date_decaissement'=>$request->date_decaissement[$i],
                'bailleur_id'=>$request->bailleur_id
            ]);
        }
        return redirect()->back();
    }

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
        $bailleurs = ActiviteBailleur::where('activite_id', '=', $activite->id)->get();
        $budget = Budget::where('id', '=', $activite->budget_id)->orderByDesc('date_budget')->first();
        return view('decaissements.show', compact('activite', 'bailleurs', 'budget', 'user', 'mail_admin'));
    }
}
