<?php

namespace App\Http\Controllers;

use App\Models\Bailleur;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BailleursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bailleurs = Bailleur::all();
        return view('bailleurs.index', compact('bailleurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bailleurs.create');
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

            'nom_bailleur'=>'required',
            'adresse_bailleur'=>'required',
            'contact_bailleur'=>'required',
            'mail_bailleur'=>'required'

        ]);


        $bailleur  = Bailleur::create([

            'nom_bailleur'=>$request->nom_bailleur,
            'adresse_bailleur'=>$request->adresse_bailleur,
            'contact_bailleur'=>$request->contact_bailleur,
            'mail_bailleur'=>$request->mail_bailleur

        ]);

        return redirect(route('bailleurs.index'))->with('success', 'Opération effetuée avec succés');

    }

    public function addBailleur(Request $request)
    {
         //dd($request->all());
         $this->validate($request, [

            'nom_bailleur'=>'required',
            'adresse_bailleur'=>'required',
            'contact_bailleur'=>'required',
            'mail_bailleur'=>'required'
        ]);


        $bailleur  = Bailleur::create([

            'nom_bailleur'=>$request->nom_bailleur,
            'adresse_bailleur'=>$request->adresse_bailleur,
            'contact_bailleur'=>$request->contact_bailleur,
            'mail_bailleur'=>$request->mail_bailleur
        ]);
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
        $bailleur = Bailleur::find($id);
        return view('bailleurs.edit', compact('bailleur'));
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
        //dd($request->all());
        $this->validate($request, [

            'nom_bailleur'=>'required',
            'adresse_bailleur'=>'required',
            'contact_bailleur'=>'required',
            'mail_bailleur'=>'required'

        ]);

        $bailleur = Bailleur::find($id);

        $bailleur->update([

            'nom_bailleur'=>$request->nom_bailleur,
            'adresse_bailleur'=>$request->adresse_bailleur,
            'contact_bailleur'=>$request->contact_bailleur,
            'mail_bailleur'=>$request->mail_bailleur

        ]);

        return redirect(route('bailleurs.index'))->with('success', 'Opération effetuée avec succés');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bailleur::destroy($id);
        return redirect(route('bailleurs.index'))->with('success', 'Opération effetuée avec succés');
    }
}
