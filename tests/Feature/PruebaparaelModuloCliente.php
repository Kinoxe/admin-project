<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PruebaparaelModuloCliente extends TestCase
{
   
    /** @test */

     function paginaindex()
    {   $this->get('/cliaente')
        ->assertStatus(200);
    }

    /** @test */

    function carga_la_pagina_del_cliente5(){
        $this->get('/aesd')
        ->assetStatus(200);
    }
}
