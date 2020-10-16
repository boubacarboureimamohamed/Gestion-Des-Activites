<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ['nom_activite', 'date_debut_activite', 'date_fin_activite', 'commentaire_activite', 'piece_jointe', 'demandeur_id', 'responsable_activite_id'];

    public function ligneActivites()
    {
        return $this->belongsToMany('App\Models\LigneActivite', 'activites_ligne_activites')->withPivot('montant_prevu', 'montant_depense');
    }

    public function responsableActivite()
    {
        return $this->belongsTo('App\Models\ResponsableActivite');
    }

    public function budgets()
    {
        return $this->hasMany('App\Models\Budget');
    }

    public function bailleurs()
    {
        return $this->belongsToMany('App\Models\Bailleur', 'activites_bailleurs')->withPivot('montant_annonce', 'montant_decaisse');
    }

    public function demandeur()
    {
        return $this->belongsTo('App\Models\Demandeur');
    }

}
