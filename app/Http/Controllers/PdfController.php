<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class PdfController extends Controller
{
    public function invoice() 
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.curriculum', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getData() 
    {

        $data =  [
            'quantity'      => '100',
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        dd($data);
        return $data;
    }
}
