<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneActivite;

class LigneActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligne_activites = LigneActivite::all();
        return view('ligne_activites.index', compact('ligne_activites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ligne_activites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LigneActivite::create([
            'nom_ligne_activite'=>$request->nom_ligne_activite,
            'nom_responsable_ligne'=>$request->nom_responsable_ligne,
            'mail_responsable_ligne'=>$request->mail_responsable_ligne,
            'contact_responsable_ligne'=>$request->contact_responsable_ligne
        ]);

        return redirect(route('ligne_activites.index'));
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
        //
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
        $ligne_activite->create([
            'nom_ligne_activite'=>$request->nom_ligne_activite,
            'nom_responsable_ligne'=>$request->nom_responsable_ligne,
            'mail_responsable_ligne'=>$request->mail_responsable_ligne,
            'contact_responsable_ligne'=>$request->contact_responsable_ligne
        ]);
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
}
