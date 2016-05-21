<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Response;

class ProfileController extends Controller
{

public function autolocal(Request $request){  
        $postales = array();
        $codPostal = $request->input('ciudad');
      
        $state = \DB::table('states')->where('name',$codPostal)->value('id');            
       $cities = \DB::table('cities')->where('state_id',$state)->orderBy('name')->distinct()->lists('name');
       foreach ($cities as $title) {
        
       array_push($postales, $title);
            }        
         return response()->json([           
            'ciudades' => $postales,
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

}


