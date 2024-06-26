<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function show($id)
    {
        $estudiante = DB::table('Estudiantes')
            ->where('usuario_id', $id)
            ->first();

        if ($estudiante) {
            $habilidades = DB::table('perfil_habilidades')
                ->join('habilidades', 'perfil_habilidades.habilidad_id', '=', 'habilidades.id')
                ->where('perfil_habilidades.perfil_id', $estudiante->estudiante_id)
                ->pluck('habilidades.nombre');

            $caracteristicas = DB::table('perfil_caracteristicas')
                ->join('caracteristicas', 'perfil_caracteristicas.caracteristica_id', '=', 'caracteristicas.id')
                ->where('perfil_caracteristicas.perfil_id', $estudiante->estudiante_id)
                ->pluck('caracteristicas.nombre');

            return response()->json([
                'nombre' => $estudiante->nombre,
                'apellido' => $estudiante->apellido,
                'ciclo' => $estudiante->ciclo,
                'carrera' => $estudiante->carrera,
                'habilidades' => $habilidades,
                'caracteristicas' => $caracteristicas,
            ]);
        } else {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }

    public function showAll()
    {
        $estudiantes = DB::table('Estudiantes')
            ->join('Usuarios', 'Estudiantes.usuario_id', '=', 'Usuarios.ID_User')
            ->select('Estudiantes.*')
            ->get();

        $perfiles = [];

        foreach ($estudiantes as $estudiante) {
            $habilidades = DB::table('perfil_habilidades')
                ->join('habilidades', 'perfil_habilidades.habilidad_id', '=', 'habilidades.id')
                ->where('perfil_habilidades.perfil_id', $estudiante->estudiante_id)
                ->pluck('habilidades.nombre');

            $caracteristicas = DB::table('perfil_caracteristicas')
                ->join('caracteristicas', 'perfil_caracteristicas.caracteristica_id', '=', 'caracteristicas.id')
                ->where('perfil_caracteristicas.perfil_id', $estudiante->estudiante_id)
                ->pluck('caracteristicas.nombre');

            $perfiles[] = [
                'nombre' => $estudiante->nombre,
                'apellido' => $estudiante->apellido,
                'ciclo' => $estudiante->ciclo,
                'carrera' => $estudiante->carrera,
                'habilidades' => $habilidades,
                'caracteristicas' => $caracteristicas,
            ];
        }

        return response()->json($perfiles);
    }
}
