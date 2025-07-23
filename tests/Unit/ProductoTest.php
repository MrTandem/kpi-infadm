<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Productotest as Producto;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    
     public function test_calcular_iva()
     {
        $producto = new Producto(['precio' => 100]);
        $iva = $producto->calcularIVA();

        $this->assertEquals(16, $iva);
     }
}