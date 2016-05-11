<?php

namespace App\Http\Controllers;
use App\PersonalSite;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class SitesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function sites()
    {
    	$sites = PersonalSites::lists('site', 'id');
    	return $sites;
    }*/

       public function getName()
    {
        $queries = \DB::table('personalsites')
            ->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->site];
        }
        return Response::json($results);
   }
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
}
