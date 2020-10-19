<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResponsableActivite;

class ResponsablesActivite extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsable_activites = ResponsableActivite::all();
        return view('responsable_activites.index', compact('responsable_activites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responsable_activites.create');
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
            'nom_responsable_activite'=>'required',
            'prenom_responsable_activite'=>'required',
            'mail_responsable_activite'=>'required',
            'contact_responsable_activite'=>'required'
        ]);

        ResponsableActivite::create([
            'nom_responsable_activite'=>$request->nom_responsable_activite,
            'prenom_responsable_activite'=>$request->prenom_responsable_activite,
            'mail_responsable_activite'=>$request->mail_responsable_activite,
            'contact_responsable_activite'=>$request->contact_responsable_activite
        ]);

        return redirect(route('responsable_activites.index'))->with('success', 'Operation effectue avec succes!');
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
        $responsable_activite = ResponsableActivite::find($id);
        return view('responsable_activites.edit', compact('responsable_activite'));
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
            'nom_responsable_activite'=>'required',
            'prenom_responsable_activite'=>'required',
            'mail_responsable_activite'=>'required',
            'contact_responsable_activite'=>'required'
        ]);

        $responsable_activite = ResponsableActivite::find($id);

        $responsable_activite ->update([
            'nom_responsable_activite'=>$request->nom_responsable_activite,
            'prenom_responsable_activite'=>$request->prenom_responsable_activite,
            'mail_responsable_activite'=>$request->mail_responsable_activite,
            'contact_responsable_activite'=>$request->contact_responsable_activite
        ]);

        return redirect(route('responsable_activites.index'))->with('success', 'Operation effectue avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsable_activite= ResponsableActivite::with('activities')->find($id);

        if($responsable_activite->activities)
        {
            return redirect(route('responsable_activites.index'))->with('error', 'Vous ne pouvez pas supprimer cet responsable car il a deja au moins une activte sous sa responsabilite!');
        }
        ResponsableActivite::destroy($id);
        return redirect(route('responsable_activites.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
