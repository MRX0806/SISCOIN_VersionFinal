<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;

    protected $table = 'caracteristicas';
    protected $primaryKey = 'id';

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'perfil_caracteristicas', 'caracteristica_id', 'perfil_id');
    }
}
