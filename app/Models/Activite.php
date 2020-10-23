<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ['nom_activite', 'date_debut_activite', 'date_fin_activite', 'commentaire_activite', 'piece_jointe', 'budget_id', 'projet_mise_en_oeuvre_id'];

    public function budgets()
    {
        return $this->belongsToMany('App\Models\Budget');
    }

    public function ActiviteBailleurs()
    {
        return $this->hasMany('App\Models\ActiviteBailleur');
    }

    public function ligneActivites()
    {
        return $this->belongsToMany('App\Models\LigneActivite');
    }

    public function projetMiseEnOeuvre()
    {
        return $this->belongsTo('App\Models\ProjetMiseEnOeuvre');
    }

}
