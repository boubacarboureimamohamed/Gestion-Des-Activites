<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjetMiseEnOeuvre;
use App\Models\PlanAction;

class PlanActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan_actions = PlanAction::all();
        return view('plan_actions.index', compact('plan_actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan_actions.create');
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

        'nom_plan_action'=>'required',
    ]);

    $plan_action = PlanAction::create([

        'nom_plan_action'=>$request->nom_plan_action,
        'commentaire'=>$request->commentaire
    ]);


    for($i=0; $i< count($request->nom_projet); $i++)
        {
        ProjetMiseEnOeuvre::create([
                'nom_projet'=>$request->nom_projet[$i],
                'nom_responsable_projet'=>$request->nom_responsable_projet[$i],
                'email_responsable_projet'=>$request->email_responsable_projet[$i],
                'contact_responsable_projet'=>$request->contact_responsable_projet[$i],
                'plan_action_id'=>$plan_action->id
            ]);
        }

        return redirect(route('plan_actions.index'))->with('success', 'Operation effectue avec success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan_action = PlanAction::find($id);
        return view('plan_actions.show', compact('plan_action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan_action = PlanAction::find($id);
        return view('plan_actions.edit', compact('plan_action'));
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
        $plan_action = PlanAction::find($id);

        $this->validate($request, [

            'nom_plan_action'=>'required',
        ]);
    
        $plan_action->update([
    
            'nom_plan_action'=>$request->nom_plan_action,
            'commentaire'=>$request->commentaire
        ]);
    
            return redirect(route('plan_actions.index'))->with('success', 'Operation effectue avec success!');
    
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
