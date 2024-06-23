<?php
namespace App\Http\Controllers;

use App\Models\Habilidad;
use App\Models\Caracteristica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BusquedaController extends Controller
{
    public function getHabilidades()
    {
        try {
            $habilidades = Habilidad::all();
            return response()->json($habilidades);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCaracteristicas()
    {
        try {
            $caracteristicas = Caracteristica::all();
            return response()->json($caracteristicas);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function obtenerEstudiantes()
{
    try {
        $estudiantes = DB::table('Estudiantes as e')
            ->join('Perfiles as p', 'e.estudiante_id', '=', 'p.estudiante_id')
            ->leftJoin('perfil_habilidades as ph', 'p.perfil_id', '=', 'ph.perfil_id')
            ->leftJoin('Habilidades as h', 'ph.habilidad_id', '=', 'h.id')
            ->leftJoin('perfil_caracteristicas as pc', 'p.perfil_id', '=', 'pc.perfil_id')
            ->leftJoin('Caracteristicas as c', 'pc.caracteristica_id', '=', 'c.id')
            ->select(
                DB::raw('CONCAT(e.nombre, " ", e.apellido) as nombre_completo'),
                DB::raw('GROUP_CONCAT(DISTINCT h.nombre SEPARATOR ", ") as habilidades'),
                DB::raw('GROUP_CONCAT(DISTINCT c.nombre SEPARATOR ", ") as caracteristicas')
            )
            ->groupBy('e.estudiante_id', 'e.nombre', 'e.apellido') // Agrega las columnas `e.nombre` y `e.apellido` al GROUP BY
            ->get();

        return response()->json($estudiantes);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    public function filtrarEstudiantes(Request $request)
    {
        try {
            $habilidadId = $request->input('habilidad_id');
            $caracteristicaId = $request->input('caracteristica_id');

            $estudiantes = DB::table('Estudiantes as e')
                ->join('Perfiles as p', 'e.estudiante_id', '=', 'p.estudiante_id')
                ->leftJoin('perfil_habilidades as ph', 'p.perfil_id', '=', 'ph.perfil_id')
                ->leftJoin('Habilidades as h', 'ph.habilidad_id', '=', 'h.id')
                ->leftJoin('perfil_caracteristicas as pc', 'p.perfil_id', '=', 'pc.perfil_id')
                ->leftJoin('Caracteristicas as c', 'pc.caracteristica_id', '=', 'c.id')
                ->select(
                    DB::raw('CONCAT(e.nombre, " ", e.apellido) as nombre_completo'),
                    DB::raw('GROUP_CONCAT(DISTINCT h.nombre SEPARATOR ", ") as habilidades'),
                    DB::raw('GROUP_CONCAT(DISTINCT c.nombre SEPARATOR ", ") as caracteristicas')
                )
                ->when($habilidadId, function ($query, $habilidadId) {
                    return $query->where('ph.habilidad_id', $habilidadId);
                })
                ->when($caracteristicaId, function ($query, $caracteristicaId) {
                    return $query->orWhere('pc.caracteristica_id', $caracteristicaId);
                })
                ->groupBy('e.estudiante_id', 'e.nombre', 'e.apellido') // Agrega las columnas `e.nombre` y `e.apellido` al GROUP BY
                ->get();

            return response()->json($estudiantes);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function cargarEstudiantes()
    {
        try {
            $estudiantes = DB::table('Estudiantes as e')
                ->join('Perfiles as p', 'e.estudiante_id', '=', 'p.estudiante_id')
                ->leftJoin('perfil_habilidades as ph', 'p.perfil_id', '=', 'ph.perfil_id')
                ->leftJoin('Habilidades as h', 'ph.habilidad_id', '=', 'h.id')
                ->leftJoin('perfil_caracteristicas as pc', 'p.perfil_id', '=', 'pc.perfil_id')
                ->leftJoin('Caracteristicas as c', 'pc.caracteristica_id', '=', 'c.id')
                ->select(
                    DB::raw('CONCAT(e.nombre, " ", e.apellido) as nombre_completo'),
                    DB::raw('GROUP_CONCAT(DISTINCT h.nombre SEPARATOR ", ") as habilidades'),
                    DB::raw('GROUP_CONCAT(DISTINCT c.nombre SEPARATOR ", ") as caracteristicas')
                )
                ->groupBy('e.estudiante_id', 'e.nombre', 'e.apellido') // Agrega las columnas `e.nombre` y `e.apellido` al GROUP BY
                ->get();

            return response()->json($estudiantes);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
