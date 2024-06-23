<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'comentario_id';

    protected $fillable = [
        'tema_id', 'comentario', 'fecha'
    ];

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id');
    }
}

