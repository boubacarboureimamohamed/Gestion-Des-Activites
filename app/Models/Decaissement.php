<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decaissement extends Model
{
    protected $fillable = ['montant_decaisse', 'date_decaissement', 'bailleur_id'];
}
