<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# Imports
use App\Cidade;

class CidadeTest extends TestCase
{
    public function testGetCidades()
    {
        //Verificando método e formato de retorno
        $arrayCidades = Cidade::getAll();
        $this->assertTrue(!empty($arrayCidades));
        $this->assertTrue(gettype($arrayCidades) == "array");
        
        //Verificando se elemento de retorno possui os atributos esperados
        $nomeCidade = Cidade::getNomePorIdCidade(array_keys($arrayCidades)[0]);
        $this->assertTrue(!empty($nomeCidade));
    }
}