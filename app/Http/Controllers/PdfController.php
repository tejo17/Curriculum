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
        
        $otros = self::cut($datos['checkboxotrosCursos']);
        $otros = array_chunk($otros, 4);
    
        $certificaciones = self::cut($datos['checkboxCertificaciones']);
        $certificaciones = array_chunk($certificaciones, 3);
        if($certificaciones[0][0] == false){
            $certificaciones[0] = 'vacio';
        };
        if($otros[0][0] == false){
            $otros[0] = 'vacio';
        };
        //dd($certificaciones);
       //dd(compact('datos','aptitudes','otros','certificaciones'));
       $view =  \View::make('pdf.curriculum', compact('datos','aptitudes','otros','certificaciones'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    
}
