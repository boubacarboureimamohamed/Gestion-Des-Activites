<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiviteLigneActivite extends Model
{
    protected $fillable = ['montant_prevu', 'nom_responsable', 'mail_responsable', 'contact_responsable', 'activite_id', 'ligne_activite_id'];


    public function ligneActivite()
    {
        return $this->belongsTo('App\Models\LigneActivite');
    }

    public function activite()
    {
        return $this->belongsTo('App\Models\Activite');
    }
}
