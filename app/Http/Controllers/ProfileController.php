<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use DB;
use Response;

class ProfileController extends Controller
{
	 protected function index(){
       
        return view('student.profile');
    } // index()

     protected function store()
    {

        
        }

    
  private function create()
    {//obtengo los datos
       $city_id = self::obtenerCityId();
        
        try {
            $arrayDatos=$this->request->all();
           

            $arrayDatos["postalCode"] = "";
           
            $arrayDatos["city_id"] = "$city_id";
            var_dump($arrayDatos);

            $insert = Student::create($arrayDatos);
            
        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insert)){
            return $insert;
        }
        return false;
    } // create()

public function autocomplete(){
    $term = Input::get('term');
    
    $results = array();
    
    $queries = DB::table('users')
        ->where('first_name', 'LIKE', '%'.$term.'%')
        ->orWhere('last_name', 'LIKE', '%'.$term.'%')
        ->take(5)->get();
    
    foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->first_name.' '.$query->last_name ];
    }
return Response::json($results);
}
   
/*public function autolocal(Request $request){
        $postal = new User();
        $postales = array();
        $codPostal = $request->input('codPostal');
        $codPostalstate =  substr($codPostal,0,2);
        $state = \DB::table('states')->where('id',$codPostalstate)->value('name');
        $postal->provincia = $state;
        
        if (strlen($codPostal) == 5) {
            
       $cities = \DB::table('cities')->where('postalCode',$codPostal)->lists('name');
       foreach ($cities as $title) {
       array_push($postales, $title);
            }
            
        }
         return response()->json([
            'provincia' => $state,
            'ciudades' => $postales,
        ]);

    }*/

}
