<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productotest extends Model
{
    protected $fillable = ['nombre', 'precio'];

    public function calcularIVA()
    {
        return $this->precio * 0.16;
    }
}