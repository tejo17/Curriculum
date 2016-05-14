<?php

namespace App\Http\Controllers;
use App\Aptitude;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class AptitudesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function getAptitude()
    {
        $queries = \DB::table('aptitudes')
        	->orderBy('aptitude')
          ->get();
                   
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->aptitude];
        }
        return Response::json($results);
   }
   
   public function store(Request $request){
          $aptitude = $request->input();
          $user_id = \Auth::user()->id;
          $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
   
           
    try {
      $queries = \DB::table('aptitudes')
      ->join('students','aptitudes.student_id','=','students.id')
      ->where('student_id',$student_id)
      ->insert(['aptitude' => $aptitude['aptitude'],
               'student_id' => $student_id,
               'created_at' => date('YmdHms')]);     
     }
   catch(\PDOException $e) {
    
   }
  return view('student.profile');
}



   public function listAptitudesUser(){
    $user_id = \Auth::user()->id;
    $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
     
     $queries = \DB::table('aptitudes')
    ->join('students','aptitudes.student_id','=','students.id')
    ->select('aptitude')
    ->where('student_id',$student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $aptitude 
     */

    public function destroy($lang) {
       $user_id = \Auth::user()->id;
      $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
      $queries = \DB::table('aptitudes')->where('language_id',$language_id)->where('student_id',$student_id)->delete();

      //DELETE $aptitude
      return $lang;
    } 


    /*public function update($lang){
        $user_id = \Auth::user()->id;
     $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
     $language_id = \DB::table('languages')->where('language',$lang)->value('id');

     $update = \DB::table('studentlanguages')
      ->join('languages','studentlanguages.language_id','=','languages.id')
      ->join('students','studentlanguages.student_id','=','students.id')
      ->where('student_id',$student_id)
      ->where('language_id',$language_id)
      ->select('language','WrittedExpression','listeningComprehension','oralExpression','readingComprehension')
      ->get();
    return Response::json($update);
    }*/
}