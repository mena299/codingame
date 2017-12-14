<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorseController extends Controller
{

    public function horseRacing(){

        fscanf(STDIN, "%d",
            $N
        );
        $strength = array();
        for ($i = 0; $i < $N; $i++) {
            fscanf(STDIN, "%d", $Pi);
            $strength[] = $Pi;

        }

        sort($strength);

        $strengthDiff = array();
        for ($s = 0; $s < count($strength); $s++) {

            if (isset($strength[$s + 1])) {
                $strengthDiff[] = abs($strength[$s] - $strength[$s + 1]);

            }
        }
        $min = min($strengthDiff);
        echo($min . "\n");

    }
}
