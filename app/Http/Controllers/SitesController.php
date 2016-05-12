<?php

namespace App\Http\Controllers;
use App\PersonalSite;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use Auth;

class SitesController extends Controller
{

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
          $account = $request->input('personalsite');
          $site = $request->input('site');
          $user_id = Auth::user()->id;
          $site_id = \DB::table('personalsites')->where('site' , $site)->value('id');
          $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
 

    try {
            $queries = \DB::table('studentpersonalsites')
    ->join('personalsites','studentpersonalsites.site_id','=','personalsites.id')
    ->join('students','studentpersonalsites.student_id','=','students.id')
    ->where('student_id',$student_id)
    ->insert(['personalSite' => $account,
             'site_id' => $site_id,
             'student_id' => $student_id,
             'created_at' => date('YmdHms'),
             ]);
    
    } catch (\Exception $e) {
      echo "Registro duplicado";
    }
      
       



    return view('student.profile');
   }
}
