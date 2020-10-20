<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneActivite extends Model
{
    protected $fillable = ['nom_ligne_activite'];

    public function justifications()
    {
        return $this->hasMany('App\Models\Justification');
    }

    public function activiteLigneActivites()
    {
        return $this->hasMany('App\Models\ActiviteLigneActivite');
    }
}
