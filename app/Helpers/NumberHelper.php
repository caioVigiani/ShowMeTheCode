<?php

namespace App\Helpers;

class NumberHelper{
    public static function formataPreco($preco){
        if($preco === null) {
            return '-';
        } else {
            return '$'.number_format (
                $preco,
                2,
                ",",
                "."
            );
        }
    }
}