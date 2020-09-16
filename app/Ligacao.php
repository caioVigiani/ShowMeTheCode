<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligacao extends Model
{
    public static function calculaPrecoLigacao($idOrigem, $idDestino, $minutosLigacao, $temPacote = false, $minutosPacote = 0) {
        if($temPacote && $minutosPacote)
            $minutosLigacao = ($minutosLigacao - $minutosPacote > 0 ? $minutosLigacao - $minutosPacote : 0);
        
        $preco = Ligacao::getPrecoMinutoOrigemParaDestino($idOrigem, $idDestino, $temPacote);

        return ($preco ? $minutosLigacao * $preco : $preco);
    }

    public static function getPrecoMinutoOrigemParaDestino($idOrigem, $idDestino, $temPacote) {

        $arrayPreços =
        [
            "011" =>
            [
                "016" => 1.9,
                "017" => 1.7,
                "018" => 0.9,
            ],
            "016" =>
            [
                "011" => 2.9
            ],
            "017" =>
            [
                "011" => 2.7
            ],
            "018" =>
            [
                "011" => 1.9
            ],
        ];

        if(!empty($arrayPreços[$idOrigem]) && !empty($arrayPreços[$idOrigem][$idDestino])) {
            // regra de negócio: quando calculando ligação que possui pacote, acrescentar 10% no valor dos minutos além dos minutos dentro do pacote
            return (
                $temPacote ? $arrayPreços[$idOrigem][$idDestino] + ($arrayPreços[$idOrigem][$idDestino] * 0.1)
                : $arrayPreços[$idOrigem][$idDestino]
            );
        } else {
            return NULL;
        }
    }
}