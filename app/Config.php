<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $timestemps = false;
    protected $fillable = [
        'theme'
    ];
}
