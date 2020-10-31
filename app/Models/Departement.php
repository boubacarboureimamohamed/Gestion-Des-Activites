<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['libelle_departement', 'direction_id'];

    public function direction()
    {
        return $this->belongsTo('App\Models\Direction');
    }
    
    public function beneficiaires()
    {
        return $this->hasMany('App\Models\Beneficiaire');
    }
}
