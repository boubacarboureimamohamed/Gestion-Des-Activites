<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bailleur extends Model
{
    protected $fillable = ['nom_bailleur', 'contact_bailleur', 'adresse_bailleur'];

    public function activites()
    {
        return $this->hasMany('App\Models\Activite')->withPivot('montant_annonce', 'montant_decaisse');
    }
}
