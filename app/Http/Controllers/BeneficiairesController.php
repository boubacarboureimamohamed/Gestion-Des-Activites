<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiaire;

class BeneficiairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiaires = Beneficiaire::all();
        
        return view('beneficiaires.index', compact('beneficiaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficiaires.create');
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
        'nom_beneficiaire'=>'required'
    ]);
    
        Beneficiaire::create([
        'nom_beneficiaire'=>$request->nom_beneficiaire
    ]);

    return redirect(route('beneficiaires.index'))->with('success', 'Operation effectue avec success!');
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
        //
    }

    public function modifier_beneficiaire(Request $request, Beneficiaire $beneficiaire)
    {
        dd($request->all());
        $this->validate($request, [

            'nom_beneficiaire'=>'required',
        ]);
        $beneficiaire->update([
            'nom_beneficiaire'=>$request->nom_beneficiaire
        ]);

        return redirect(route('beneficiaires.index'))->with('success', 'Opération effectuée avec success!');
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
