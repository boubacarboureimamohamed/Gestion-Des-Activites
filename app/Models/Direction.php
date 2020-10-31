<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = ['libelle_direction'];

    public function departements()
    {
        return $this->hasMany('App\Models\Departement');
    }
}
