<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'carrera',
        'ciclo',
        'usuario_id'
    ];
    protected $primaryKey = 'estudiante_id';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'estudiante_id');
    }

    public function repositorios()
    {
        return $this->hasMany(Repositorio::class, 'estudiante_id');
    }
}
