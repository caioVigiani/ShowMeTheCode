<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public static function getAll(){
        return [
            "011" => "Cidade011",
            "016" => "Cidade016",
            "017" => "Cidade017",
            "018" => "Cidade018"
        ];
    }

    public static function getNomePorIdCidade($idCidade){
        $arrayNomeCidades = [
            "011" => "Cidade011",
            "016" => "Cidade016",
            "017" => "Cidade017",
            "018" => "Cidade018"
        ];

        return (!empty($arrayNomeCidades[$idCidade]) ? $arrayNomeCidades[$idCidade] : '');
    }
}