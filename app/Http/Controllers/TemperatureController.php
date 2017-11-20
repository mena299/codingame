<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    public function gettemperature()
    {

        $input = "1 -2 -8 4 5"; //1
//        $input = "-12 -5 -137"; //-5
//        $input = "42 -5 12 21 5 24"; //5
//        $input = "42 5 12 21 -5 24"; //5
//        $input = "-5 -4 -2 12 -40 4 2 18 11 5"; //2
//        $input = "0"; //0


//        $inputs = explode(" ", $input);

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));$sort = sort($inputs


        $exp_temp = explode(' ',$input);
        sort($exp_temp);

        $number = 0;

        echo $input ? $this->calcTemps($exp_temp, $number) : 0;
    }




    function calcTemps($exp_temp, $number)
    {
        foreach ($exp_temp as $a) {
            if ($a > $number) {
                return count($exp_temp) == 3 ? $a : abs($a);
            }
        }

        return empty($exp_temp) ? 0 : end($exp_temp);
    }
}
