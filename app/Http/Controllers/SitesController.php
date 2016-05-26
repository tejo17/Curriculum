<?php

namespace App\Http\Controllers;
use App\PersonalSite;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use Auth;

class SitesController extends Controller
{

  public function index()
  {
    return view('student.profile');
  }

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


   public function store(Request $request)
   {
          $account = $request->input('personalsite');
          $site = $request->input('site');
          $site_id = \DB::table('personalsites')->where('site' , $site)->value('id');

      
      
    if($request->input('id')==0)
    {
      try {
            $queries = \DB::table('studentPersonalSites')
    ->join('personalSites','studentPersonalSites.site_id','=','personalSites.id')
    ->join('students','studentPersonalSites.student_id','=','students.id')
    ->where('student_id',$this->student_id)
    ->insert(['personalSite' => $account,
             'site_id' => $site_id,
             'student_id' => $this->student_id,
             'created_at' => date('YmdHms'),
             ]);
    
      } catch (\Exception $e) {
        
      }
 
          
    }else{
       $queries = \DB::table('studentPersonalSites')
    ->join('personalSites','studentPersonalSites.site_id','=','personalSites.id')
    ->join('students','studentPersonalSites.student_id','=','students.id')
    ->where('studentpersonalsites.id',$request->input('id'))
    ->update(['personalSite' => $account,
             'site_id' => $site_id,
             'student_id' => $this->student_id,
             ]);
    }   
    
    
    return view('student.profile');
   }


    public function listSitesUsers(){
    
     $queries = \DB::table('studentPersonalSites')
    ->join('personalSites','studentPersonalSites.site_id','=','personalSites.id')
    ->join('students','studentPersonalSites.student_id','=','students.id')
    ->select('site','personalSite','studentPersonalSites.id')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

    /**
     * @param  String $site 
     */

    public function destroy($site)
    {
      $queries = \DB::table('studentpersonalSites')
       ->where('id',$site)
       ->delete();

      //DELETE $site
      return $site;
    } 
}
