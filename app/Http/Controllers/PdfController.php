<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use Auth;

class PdfController extends Controller
{
    public function cut($string)
    {
        $array = explode('{},' , $string );
       
        for ($i=0; $i <sizeof($array) ; $i++) { 

            if ($i == sizeof($array)-1) {
                $array[$i]=substr($array[$i], 0, -2);
            }
        }
        return $array;
    }
    public function invoice(Request $request) 
    {

        $datos = $request->all();
        $aptitudes = self::cut($datos['checkboxaptitudes']);
        dd($datos);
        
    
        $view =  \View::make('pdf.curriculum', compact('datos','aptitudes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    
}
