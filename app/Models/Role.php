<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Role extends Model
{
    protected $fillable = [
        'nombre',
        'estado', // Nuevo campo
        'descripcion',
    ];


    // Relación muchos a muchos con Permiso
    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'role_permiso', 'role_id', 'permiso_id');
    }

        /**
     * Un rol puede tener muchos usuarios.
     */
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

}
