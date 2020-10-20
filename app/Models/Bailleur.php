<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bailleur extends Model
{
    protected $fillable = ['nom_bailleur', 'contact_bailleur', 'adresse_bailleur', 'mail_bailleur'];

    public function ActiviteBailleurs()
    {
        return $this->hasMany('App\Models\ActiviteBailleur');
    }
}
