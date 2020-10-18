<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Justification extends Model
{
    protected $fillable = ['libelle', 'montant_depense', 'piece_jointe', 'ligne_activite_id'];

    public function ligne_activite()
    {
        return $this->belongsTo('App\Models\LigneActivite');
    }
}
