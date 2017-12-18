<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MimeTypeController extends Controller
{
    public function mimeType(){
        fscanf(STDIN, "%d",
            $N // Number of elements which make up the association table.
        );
        fscanf(STDIN, "%d",
            $Q // Number Q of file names to be analyzed.
        );

        $extensions = array();
        $mimes = array();
        for ($i = 0; $i < $N; $i++) {
            fscanf(STDIN, "%s %s",
                $EXT, // file extension
                $MT // MIME type.
            );

            $extensions[$i + 1] = strtolower($EXT);
            $mimes[$i + 1] = $MT;
        }
        for ($i = 0; $i < $Q; $i++) {
            $FNAME[] = stream_get_line(STDIN, 500 + 1, "\n"); // One file name per line.
        }


        foreach ($FNAME as $fn) {

            $rawExtension = explode('.', $fn);
            $extension = count($rawExtension) > 1 ? strtolower(end($rawExtension)) : null;

            $search = array_search($extension, $extensions);
            $returnData = isset($mimes[$search]) ? $mimes[$search] : "UNKNOWN";


            echo "$returnData\n";

        }
    }
}
