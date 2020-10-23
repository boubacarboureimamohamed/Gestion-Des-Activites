<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetMiseEnOeuvre extends Model
{
    protected $fillable = ['nom_projet', 'nom_responsable_projet', 'email_responsable_projet', 'contact_responsable_projet', 'plan_action_id'];

    public function planAction()
    {
        return $this->belongsTo('App\Models\PlanAction');
    }

    public function Activite()
    {
        return $this->belongsToMany('App\Models\Activite');
    }


}
