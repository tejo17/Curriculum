<?php

namespace App\Http\Controllers;
use App\Language;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class LanguagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

       public function getLanguage()
    {
        $queries = \DB::table('languages')
        	->orderBy('language')
            ->get();
            
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->language];
        }
        return Response::json($results);
   }
   /*
   public function store(Request $request){
           $sites = $request->input('personalsite');
//dd($sites);
    //INSERT
   try {
    //$queries = \DB::table('personalsites')->insert(['site' => $sites]);
   }
   catch(\PDOException $e) {
    
   }
    //print_r($queries);

    //$queries = 1 -- TODO BIEN

    return view('student.profile');
   }
   */
}
