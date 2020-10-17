<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneActivite extends Model
{
    protected $fillable = ['nom_ligne_activite', 'nom_responsable_ligne', 'mail_responsable_ligne', 'contact_responsable_ligne'];

    public function activities()
    {
        return $this->belongsToMany('App\Models\Activite', 'activites_ligne_activites')->withPivot('montant_prevu', 'nom_responsable', 'mail_responsable', 'contact_responsable');
    }

    public function justifications()
    {
        return $this->hasMany('App\Models\Justification');
    }
}
