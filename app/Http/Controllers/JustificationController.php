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
        $user = auth()->user();
        foreach($user->roles as $role)
            {
                if($role->name == 'Admin')
                    {
                        $mail_admin  = $user->email;
                    }
            }
        $activites = Activite::all();
        return view('justifications.justification', compact('activites', 'user', 'mail_admin'));
    }

    public function justification($id)
    {
        $activite = LigneActivite::find($id);
        return view('justifications.create', compact('activite'));
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
