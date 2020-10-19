<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\Bailleur;
use App\Models\Decaissement;

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
                $x = $user->email;
            }
        }
        $mail_admin = $x;
        $activites = Activite::all();
        return view('decaissements.decaissement', compact('activites', 'user', 'mail_admin'));
    }

    public function decaissement($id)
    {
        $bailleur = Bailleur::find($id);
        $activite = Activite::with(['bailleurs' => function($query) use($bailleur){
            $query->where('bailleurs.id', '=', $bailleur->id);
        }])->find($id);
        return view('decaissements.create', compact('bailleur', 'activite'));
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
                $x = $user->email;
            }
        }
        $mail_admin = $x;
        $activite = Activite::find($id);
        return view('decaissements.show', compact('activite', 'user', 'mail_admin'));
    }
}
