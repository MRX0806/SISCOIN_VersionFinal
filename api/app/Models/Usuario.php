<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'ID_User';

    protected $fillable = [
        'Name_Complete', 'Email', 'User', 'Password',
    ];

    protected $hidden = [
        'Password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['Password'] = bcrypt($password);
    }
}
