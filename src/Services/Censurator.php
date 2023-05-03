<?php

namespace App\Services;

class Censurator
{


    public function purify($message){

        $tabGrosMot = array('salope', 'pute', 'enculé','merde', 'putain');

        return str_ireplace($tabGrosMot, "*******",$message);
    }
}