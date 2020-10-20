<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ['nom_activite', 'date_debut_activite', 'date_fin_activite', 'commentaire_activite', 'piece_jointe', 'demandeur_id', 'responsable_activite_id', 'budget_id'];

    public function responsableActivite()
    {
        return $this->belongsTo('App\Models\ResponsableActivite');
    }

    public function budgets()
    {
        return $this->belongsToMany('App\Models\Budget');
    }

    public function demandeur()
    {
        return $this->belongsTo('App\Models\Demandeur');
    }

    public function activiteLigneActivites()
    {
        return $this->hasMany('App\Models\ActiviteLigneActivite');
    }

    public function ActiviteBailleurs()
    {
        return $this->hasMany('App\Models\ActiviteBailleur');
    }

}
