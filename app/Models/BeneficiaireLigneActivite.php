<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaireLigneActivite extends Model
{
    protected $fillable = ['beneficiaire_id', 'ligne_activite_id'];
    
    public function ligneActivite()
    {
        return $this->belongsTo('App\Models\LigneActivite');
    }

    public function beneficiaire()
    {
        return $this->belongsTo('App\Models\Beneficiaire');
    }

}
