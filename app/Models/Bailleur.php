<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bailleur extends Model
{
    protected $fillable = ['nom_bailleur', 'contact_bailleur', 'adresse_bailleur'];

    public function activites()
    {
        return $this->belongsToMany('App\Models\Activite', 'activites_bailleurs')->withPivot('montant_annonce', 'montant_decaisse');
    }
}
