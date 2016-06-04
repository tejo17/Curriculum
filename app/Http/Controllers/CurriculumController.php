<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Response;


class CurriculumController extends Controller
{

    /*Función para obtener las localidades de una provincia*/
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

   /*Autocompletado de provincias*/
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

        /*Obtener ciclos de una familia profesional*/
       public function autolocalCycles(Request $request){  
        $ciclos = array();
        $family_input = $request->input('familia');

        $family = \DB::table('proffamilies')->where('name',$family_input)->value('id');   
                 
        $cycles = \DB::table('cycles')->where('profFamilie_id',$family)->orderBy('name')->distinct()->lists('name');

        foreach ($cycles as $title) {  

           array_push($ciclos, $title);
       }    

       return response()->json([           
        'ciclos' => $ciclos,
        ]);

   }

   /*Autocompletado de familias profesionales*/
   public function autocompleteFamily(Request $req){
        $term =  $req->input('term');

        $results = array();

        $queries = DB::table('proffamilies')
        ->where('name', 'LIKE', '%'.$term.'%')
        ->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name];
        }
        return Response::json($results);
    }



public function update(Request $req){

    if(\Request::file('file') != null){
        $ruta = \Request::file('file')->move(public_path( '/img/imgUser/' . \Auth::user()->carpeta . '/'), \Request::file('file')->getClientOriginalName());
        session(['carpeta' => '/img/imgUser/' . \Auth::user()->carpeta . '/' . \Request::file('file')->getClientOriginalName(),
        'rutaSinBarra' => 'img/imgUser/' . \Auth::user()->carpeta . '/' . \Request::file('file')->getClientOriginalName()]);
    }
        
    if ($req->input('birthdate') != null) {

        $birthdateFormat = explode('-',$req->input('birthdate'));
        $birthdateFormat = $birthdateFormat[2]."-".$birthdateFormat[1]."-".$birthdateFormat[0];
        session(['birthdate' => $birthdateFormat]);

    }

    session(['firstName'    => $req->input('firstName'),
            'lastName'      => $req->input('lastName'),
            'dni'           => $req->input('dni'),
            'nre'           => $req->input('nre'),
            'phone'         => $req->input('phone'),
            'address'       => $req->input('address'),
            'nationality'   => $req->input('nationality'),
            'state'         => $req->input('state'),
            'city'          => $req->input('city'),
            'postalCode'    => $req->input('postalCode'),
            'email'         => $req->input('email'),
            ]);


    return view('student.curriculum'); 

    }
}


