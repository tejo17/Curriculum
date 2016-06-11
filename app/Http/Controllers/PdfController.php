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

        $experiences = self::cut($datos['checkboxexperiences']);
        $experiences = array_chunk($experiences, 7);
 
        $ciclos = self::cut($datos['checkboxciclos']);
        $ciclos = array_chunk($ciclos, 8);

        $lenguajes = self::cut($datos['checkboxlenguajes']);
        $lenguajes = array_chunk($lenguajes, 5);

        $licencias = $datos['checkboxlicenses'];
        
        $sitios = self::cut($datos['checkboxsites']);
        $sitios = array_chunk($sitios, 2);

        $certificaciones = self::cut($datos['checkboxCertificaciones']);
        $certificaciones = array_chunk($certificaciones, 3);
        
        $otros = self::cut($datos['checkboxotrosCursos']);
        $otros = array_chunk($otros, 4);
    
        $aptitudes = self::cut($datos['checkboxaptitudes']);

        if($experiences[0][0] == false){
            $experiences[0] = 'vacio';
        };
        if($ciclos[0][1] == false){
            $ciclos[0] = 'vacio';
        };
        if($lenguajes[0][0] == false){
            $lenguajes[0] = 'vacio';
        };
        if($licencias == ""){
            $licencias = 'vacio';
        };
        if($sitios[0][0] == false){
            $sitios[0] = 'vacio';
        };
        if($certificaciones[0][0] == false){
            $certificaciones[0] = 'vacio';
        };
        if($otros[0][0] == false){
            $otros[0] = 'vacio';
        };
        if($aptitudes[0][0] == false){
            $aptitudes[0] = 'vacio';
        };
       //dd(compact('datos','experiences','ciclos','lenguajes','licencias','sitios','certificaciones','otros','aptitudes'));
       $view =  \View::make('pdf.curriculum', compact('datos','experiences','ciclos','lenguajes','licencias','sitios','certificaciones','otros','aptitudes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    
}
