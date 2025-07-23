<?php

namespace App\Models;

use App\Models\Personal\Empleado;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    protected $fillable = [
        'nombre',
        'trabajadores',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}