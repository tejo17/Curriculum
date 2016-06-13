<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Response;
use Auth;

class CurriculumController extends Controller
{

    public function index(){

      if (isset(Auth::user()->id)) {
        $user = Auth::user()->id;
        
        /*Recuperar sus datos personales*/
        $datos = \DB::table('students')
        ->join('cities','students.city_id', '=' ,'cities.id')
        ->join('states','states.id', '=' ,'cities.state_id')
        ->join('users','users.id','=','user_id')
        ->select('firstName','lastName','dni','nre','phone','address','curriculum','birthdate','nationality','states.name as state','cities.name as city','postalCode','carpeta')
        ->where('user_id', $user)
        ->get();

        /*Por un problema con los registros de la base de datos, los códigos postales aunque sean de 4 digitos, deben llevar el 0 delante*/
        $postal = $datos[0]->postalCode;
        
        if (strlen($postal) == 4) {
            $postal = "0".$postal;
        }

        /*Recuperar el email del usuario*/
        $user_email = $user_email = \DB::table('users')->where('id' , $user)->value('email');

        /*Dar formato a la fecha*/
        $birthdateFormat = explode('-',$datos[0]->birthdate);
        $birthdateFormat = $birthdateFormat[2]."-".$birthdateFormat[1]."-".$birthdateFormat[0];

        /*Almacenar en sesión los datos personales a mostrar*/
        session(['firstName' => $datos[0]->firstName,
            'lastName' => $datos[0]->lastName,
            'dni' => $datos[0]->dni,
            'nre' => $datos[0]->nre,
            'phone' => $datos[0]->phone,
            'address' => $datos[0]->address,
            'curriculum' => $datos[0]->curriculum,
            'birthdate' => $birthdateFormat,
            'nationality' => $datos[0]->nationality,
            'state' => $datos[0]->state,
            'lastName' => $datos[0]->lastName,
            'city' => $datos[0]->city,
            'postalCode' => $postal,
            'carpeta' => '/img/imgUser/' . \Auth::user()->carpeta . '/' .  \Auth::user()->image,
            'email'   => $user_email,
            'rutaSinBarra' => 'img/imgUser/' . \Auth::user()->carpeta . '/' . \Auth::user()->image,

            ]);
    }else{
       return \Redirect::to('/');
       Session::flash('type',"danger");
       Session::flash("insert","Ha expirado la sessión");
   }

        // Devuelvo la vista junto con las familias
   return view('student.curriculum', compact('profFamilies', 'datos'));
}

/*Función para obtener las localidades de una provincia*/
public function autolocal(Request $request){  
    $ciudades = array();
    $provincia = $request->input('ciudad');

    $state = \DB::table('states')->where('name',$provincia)->value('id');            
    $cities = \DB::table('cities')->where('state_id',$state)->orderBy('name')->distinct('name')->lists('id','name');
    foreach ($cities as $name => $cityid) {  

        $name = $name;
        $ciudades[] = array("id" => $cityid,
            "nombre" => $name);
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

    $cycles = \DB::table('cycles')->where('profFamilie_id',$family)->distinct('name')->orderBy('level', 'desc')->orderBy('name')->get();

    foreach ($cycles as $cycle) {  

        $name = $cycle->name;
        $cycleid = $cycle->id;
        $level = $cycle->level;
        $ciclos[] = array(
            "id"     => $cycleid,
            "nombre" => $name,
            "level"  => $level);
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

        
        //Compruebo si recibo un fichero y su tamaño es mayor de 0
    if(\Request::file('file') != null){
        $size = \Request::file('file')->getSize();
        if ($size != 0) {
            $ruta = \Request::file('file')->move(public_path( '/img/imgUser/' . \Auth::user()->carpeta . '/'), \Request::file('file')->getClientOriginalName());
        session(['carpeta' => '/img/imgUser/' . \Auth::user()->carpeta . '/' . \Request::file('file')->getClientOriginalName(),
            'rutaSinBarra' => 'img/imgUser/' . \Auth::user()->carpeta . '/' . \Request::file('file')->getClientOriginalName()]);
        }     
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


