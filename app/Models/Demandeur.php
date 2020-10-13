<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demandeur extends Model
{
    protected $fillable = ['nom_demandeur'];

    public function activities()
    {
        return $this->HasMany('App\Models\Activite');
    }
}
