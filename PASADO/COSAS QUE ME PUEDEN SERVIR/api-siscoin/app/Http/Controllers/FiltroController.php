<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiltroController extends Controller
{
    public function getHabilidades()
    {
        $habilidades = DB::Perfil('habilidades')->pluck('nombre');
        return response()->json($habilidades);
    }

    public function getCaracteristicas()
    {
        $caracteristicas = DB::Perfil('caracteristicas')->pluck('nombre');
        return response()->json($caracteristicas);
    }
}
