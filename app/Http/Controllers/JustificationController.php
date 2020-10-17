<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Justification;
use App\Models\Activite;
use App\Models\LigneActivite;


class JustificationController extends Controller
{
    public function justification()
    {
        return view('justifications.create');
    }

}
