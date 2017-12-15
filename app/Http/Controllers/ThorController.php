<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThorController extends Controller
{
    public function thorMove(){
        fscanf(STDIN, "%d %d %d %d",
            $lightX, // the X position of the light of power
            $lightY, // the Y position of the light of power
            $initialTX, // Thor's starting X position
            $initialTY // Thor's starting Y position
        );

        $tx = $initialTX;
        $ty = $initialTY;
// game loop
        while (TRUE) {
            fscanf(STDIN, "%d",
                $remainingTurns // The remaining amount of turns Thor can move. Do not remove this line.
            );

            // Write an action using echo(). DON'T FORGET THE TRAILING \n
            // To debug (equivalent to var_dump): error_log(var_export($var, true));


            // A single line providing the move to be made: N NE E SE S SW W or NW
            // echo("SE\n");


            $x = null;
            $y = null;

            if ($tx > $lightX) {
                $tx = $tx-1;
                $x = 'W';

            } elseif ($tx < $lightX) {
                $x = 'E';
                $tx = $tx+1;

            }

            if ($ty > $lightY) {
                $y = 'N';
                $ty = $ty-1;
            } elseif ($ty < $lightY) {
                $y = 'S';
                $ty  = $ty+1;

            }

            echo("$x$y\n");
        }
    }
}
