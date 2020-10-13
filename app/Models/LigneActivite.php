<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneActivite extends Model
{
    protected $fillable = ['nom_ligne_activite', 'nom_responsable_ligne', 'mail_responsable_ligne', 'contact_responsable_ligne'];

    public function activities()
    {
        return $this->HasMany('App\Models\Activite')->withPivot('montant_prevu', 'montant_depense');
    }
}
