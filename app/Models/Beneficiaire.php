<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    protected $fillable = ['nom_beneficiaire'];
    
    public function beneficiaireLigneActivites()
    {
        return $this->hasMany('App\Models\BeneficiaireLigneActivite');
    }
}
