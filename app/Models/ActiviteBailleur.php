<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiviteBailleur extends Model
{
    protected $fillable = ['montant_annonce', 'activite_id', 'bailleur_id'];


    public function bailleur()
    {
        return $this->belongsTo('App\Models\Bailleur');
    }

    public function activite()
    {
        return $this->belongsTo('App\Models\Activite');
    }
}
