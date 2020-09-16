<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# Imports
use App\Pacote;

class PacoteTest extends TestCase
{
    public function testGetPacotes()
    {
        //Verificando método e formato de retorno
        $arrayPacotes = Pacote::getAll();
        $this->assertTrue(!empty($arrayPacotes));
        $this->assertTrue(gettype($arrayPacotes) == "array");
        
        //Verificando se elemento de retorno possui os atributos esperados
        $nomePacote = Pacote::getNomePorIdPacote(array_keys($arrayPacotes)[1]);
        $this->assertTrue(!empty($nomePacote));

        $minutosPacote = Pacote::getMinutosPorIdPacote(array_keys($arrayPacotes)[1]);
        $this->assertTrue(!empty($minutosPacote));
    }
}