<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# Imports
use App\Ligacao;

class LigacaoTest extends TestCase
{
    public function testGetLigacoes()
    {
        //Verificando retorno sem pacote
        $precoSemPacote = Ligacao::getPrecoMinutoOrigemParaDestino("011", "016", FALSE);
        $this->assertTrue(!empty($precoSemPacote));

        //Verificando retorno com pacote
        $precoComPacote = Ligacao::getPrecoMinutoOrigemParaDestino("011", "016", TRUE);
        $this->assertTrue(!empty($precoComPacote));

        //Verificando 10% adicional no preço por minuto
        $this->assertTrue($precoComPacote == ($precoSemPacote + ($precoSemPacote * 0.1)));
    }
}