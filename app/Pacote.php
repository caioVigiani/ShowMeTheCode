<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacote extends Model
{
    public static function getAll(){
        return [
            0 => "Sem Pacote",
            1 => "FaleMais 30",
            2 => "FaleMais 60",
            3 => "FaleMais 120",
        ];
    }

    public static function getNomePorIdPacote($idPacote){
        $arrayNomePacotes = [
            0 => "Sem Pacote",
            1 => "FaleMais 30",
            2 => "FaleMais 60",
            3 => "FaleMais 120",
        ];

        return (!empty($arrayNomePacotes[$idPacote]) ? $arrayNomePacotes[$idPacote] : '');
    }

    public static function getMinutosPorIdPacote($idPacote){
        $arrayMinutosPacotes = [
            0 => 0,
            1 => 30,
            2 => 60,
            3 => 120
        ];

        return (!empty($arrayMinutosPacotes[$idPacote]) ? $arrayMinutosPacotes[$idPacote] : '');
    }
}