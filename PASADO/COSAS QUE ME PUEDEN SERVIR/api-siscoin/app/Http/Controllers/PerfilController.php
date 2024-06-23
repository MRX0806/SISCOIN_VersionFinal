<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil';
    protected $primaryKey = 'perfil_id';

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }

    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'perfil_habilidades', 'perfil_id', 'habilidad_id');
    }

    public function caracteristicas()
    {
        return $this->belongsToMany(Caracteristica::class, 'perfil_caracteristicas', 'perfil_id', 'caracteristica_id');
    }
}
