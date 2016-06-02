<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use Auth;

class PdfController extends Controller
{
    public function invoice(Request $request) 
    {

        $datos = $request->all();
        $view =  \View::make('pdf.curriculum', compact('datos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    
}
