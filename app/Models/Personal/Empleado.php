<?php

namespace App\Models\Personal;

use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'nombres',
        'apellidos',
        'edad',
        'RFC',
        'direccion',
        'status',
        'departamento_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}