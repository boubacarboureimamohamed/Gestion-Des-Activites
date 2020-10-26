<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneActivite extends Model
{
    protected $fillable = ['nom_ligne_activite', 'bailleur_ligne_activite', 'montant_ligne_activite', 'quantite_ligne_activite', 'activite_id', 'commentaire'];

    public function justifications()
    {
        return $this->hasMany('App\Models\Justification');
    }

    public function activite()
    {
        return $this->belongsTo('App\Models\Activite');
    }
    
    public function beneficiaireLigneActivites()
    {
        return $this->hasMany('App\Models\BeneficiaireLigneActivite');
    }
}
