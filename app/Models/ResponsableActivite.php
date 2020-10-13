<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponsableActivite extends Model
{
    protected $fillable = ['nom_responsable_activite', 'prenom_responsable_activite', 'mail_responsable_activite', 'contact_responsable_activite'];

    public function activites()
    {
        return $this->hasMany('App\Models\Activite');
    }
}

