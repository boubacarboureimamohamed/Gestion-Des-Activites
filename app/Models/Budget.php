<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['montant_budget', 'date_budget', 'commentaire_budget', 'activite_id'];

    public function activite()
    {
        return $this->belongsTo('App\Models\Activite');
    }
}
