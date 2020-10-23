<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAction extends Model
{
    protected $fillable = ['nom_plan_action', 'commentaire'];

    public function projetMiseEnOeuvres()
    {
        return $this->hasMany('App\Models\ProjetMiseEnOeuvre');
    }
}
