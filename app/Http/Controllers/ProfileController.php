<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Response;


class ProfileController extends Controller
{

    public function autolocal(Request $request){  
        $ciudades = array();
        $provincia = $request->input('ciudad');

        $state = \DB::table('states')->where('name',$provincia)->value('id');            
        $cities = \DB::table('cities')->where('state_id',$state)->orderBy('name')->distinct()->lists('name');
        foreach ($cities as $title) {  

           array_push($ciudades, $title);
       }    

       return response()->json([           
        'ciudades' => $ciudades,
        ]);

   }
   public function autocomplete(Request $req){
    $term =  $req->input('term');

    $results = array();

    $queries = DB::table('states')
    ->where('name', 'LIKE', '%'.$term.'%')
    ->get();

    foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->name];
    }
    return Response::json($results);
}


public function update(Request $req){

        $ruta = \Request::file('file')->move(public_path('img/cv/'), \Request::file('file')->getClientOriginalName());
        session(['carpeta' => '../img/cv/' . \Request::file('file')->getClientOriginalName()]);
    
    if ($req->input('birthdate') != null) {
        session(['birthdate' => $req->input('birthdate')]);

    }


    session(['firstName' => $req->input('firstName'),
        'lastName' => $req->input('lastName'),
        'dni' => $req->input('dni'),
        'nre' => $req->input('nre'),
        'phone' => $req->input('phone'),
        'address' => $req->input('address'),
        'nationality' => $req->input('nationality'),
        'state' => $req->input('state'),
        'city' => $req->input('city'),
        'postalCode' => $req->input('postalCode')
        ]);


    return view('student.profile'); 

    }
}


