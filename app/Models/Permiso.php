<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Permiso extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'nombre',
        'estado',
        'descripcion',
    ];

    protected $casts = [
        'estado' => 'string', // Cast para el campo 'estado'
    ];


  // Relación muchos a muchos con Role
  public function roles()
  {
      return $this->belongsToMany(Role::class, 'role_permiso', 'permiso_id', 'role_id');
  }
}
