<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Activite;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responseø
     */
    public function index()
    {
        $budgets = Budget::with('activite')->get();
        return view('budgets.index', compact('budgets'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activites = Activite::all();
        return view('budgets.create', compact('activites'));
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
            'montant_budget'=>'required|numeric',
            'date_budget'=>'required|date',
            'activite_id'=>'required',
            'commentaire_budget'=>'required'
        ]);

        Budget::create([
            'montant_budget'=>$request->montant_budget,
            'date_budget'=>$request->date_budget,
            'commentaire_budget'=>$request->commentaire_budget,
            'activite_id'=>$request->activite_id
        ]);

        return redirect(route('budgets.index'))->with('success', 'Operation effectue avec success!');
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
        $budget = Budget::find($id);
        $activites = Activite::all();
        return view('budgets.edit', compact('budget', 'activites'));
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
        dd($request->all());
        $this->validate($request, [

            'montant_budget'=>'required|numeric',
            'date_budget'=>'required|date',
            'commentaire_budget'=>'required'
        ]);

        $budget = Budget::find($id);
        $budget->create([
            'montant_budget'=>$request->montant_budget,
            'date_budget'=>$request->date_budget,
            'commentaire_budget'=>$request->commentaire_budget,
            'activite_id'=>$request->activite_id
        ]);

        return redirect(route('budgets.index'))->with('success', 'Operation effectue avec success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget= Budget::with('activite')->find($id);

        if($budget->activite)
        {
            return redirect(route('budgets.index'))->with('error', 'Vous ne pouvez pas supprimer cet budget car il est deja lie a une activite!');
        }
        Budget::destroy($id);
        return redirect(route('demandeurs.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
