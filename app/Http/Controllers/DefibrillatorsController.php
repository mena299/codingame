<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefibrillatorsController extends Controller
{

    public function getLocation()
    {
        $LON = '3,879483';
        $LAT = '43,608177';

        $DEFIB = array(
            2 => "1;Maison de la Prevention Sante;6 rue Maguelone 340000 Montpellier;;3,87952263361082;43,6071285339217",
            1 => "2;Hotel de Ville;1 place Georges Freche 34267 Montpellier;;3,89652239197876;43,5987299452849",
            0 => "3;Zoo de Lunaret;50 avenue Agropolis 34090 Mtp;;3,87388031141133;43,6395872778854"


        );


        $locations = array();
        foreach ($DEFIB as $key => $DE) {
            $replace = str_replace(',', '.', $DE);
            $locations[$key] = explode(';', $replace);
        }

        $userLon = str_replace(',', '.', $LON);
        $userLat = str_replace(',', '.', $LAT);

        $distance = null;
        $lastLocation = null;
        foreach ($locations as $key => $location) {
            $x = (($location[4] - $userLon) * cos(($userLat + $location[5]) / 2));
            $y = ($location[5] - $userLat);
            $dis = sqrt(pow($x, 2) + pow($y, 2)) * 6371;

            if ($distance === null || $distance > $dis) {
                $distance = $dis;
                $lastLocation = $location[1];
            }


        }

        echo("$lastLocation\n");
    }
}
