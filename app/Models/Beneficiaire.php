<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    protected $fillable = ['nom_beneficiaire', 'departement_id'];
    
    public function beneficiaireLigneActivites()
    {
        return $this->hasMany('App\Models\BeneficiaireLigneActivite');
    }

    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }
}
