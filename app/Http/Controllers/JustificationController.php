<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Justification;
use App\Models\Activite;
use App\Models\LigneActivite;
use App\Models\ActiviteLigneActivite;

class JustificationController extends Controller
{
    public function interfacejustification()
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
        $ligne_activites = ActiviteLigneActivite::all();
        return view('justifications.justification', compact('activites', 'user', 'mail_admin', 'ligne_activites'));
    }

    public function ligne_activite_justifier()
    {

    }

    public function justification($id, Activite $activite)
    {
        $ligne_activite = ActiviteLigneActivite::where('activite_id', '=', $activite->id)->find($id);
        return view('justifications.create', compact('activite', 'ligne_activite'));
    }


    public function justification_store(Request $request)
    {
        for($i=0; $i< count($request->libelle); $i++)
        {
            Justification::create([
                'libelle'=>$request->libelle[$i],
                'montant_depense'=>$request->montant_depense[$i],
                'piece_jointe'=>$request->piece_jointe[$i],
                'ligne_activite_id'=>$request->ligne_activite_id
            ]);
        }
        return redirect()->back();
    }

}
