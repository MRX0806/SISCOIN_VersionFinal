<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repositorio extends Model
{
    use HasFactory;

    protected $table = 'repositorios';
    protected $primaryKey = 'repositorio_id';

    protected $fillable = [
        'titulo', 'fecha', 'curso', 'linea_investigacion', 'estudiante_id'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }
}
