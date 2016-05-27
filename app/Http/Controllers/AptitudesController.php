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
    public function index(){
      return view('student.profile');
    }

   public function store(Request $request){
          $aptitude = $request->input();
          $exist = \DB::table('aptitudes')
          ->where('aptitude',$aptitude['aptitude'])
          ->where('student_id',$this->student_id)
          ->first();

    try {
      if ($aptitude['id'] == 0 && $exist == null) {
        if ($aptitude['aptitude'] !== "") {
           $queries = \DB::table('aptitudes')
      ->join('students','aptitudes.student_id','=','students.id')
      ->where('student_id',$this->student_id)
      ->insert(['aptitude' => $aptitude['aptitude'],
               'student_id' => $this->student_id,
               'created_at' => date('YmdHms')]);  
        }
       
      }else{
        $queries = \DB::table('aptitudes')
      ->join('students','aptitudes.student_id','=','students.id')
      ->where('student_id',$this->student_id)
      ->where('aptitudes.id',$aptitude['id'])
      ->update(['aptitude' => $aptitude['aptitude']]);   
      }
      }
   catch(\PDOException $e) {
    
   }
  return view('student.profile');
}



   public function listAptitudesUser()
   {
     $queries = \DB::table('aptitudes')
    ->join('students','aptitudes.student_id','=','students.id')
    ->select('aptitudes.id','aptitude')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $aptitude 
     */

    public function destroy($apt)
    {
      
      $queries = \DB::table('aptitudes')
      ->where('id',$apt)
      ->where('student_id',$this->student_id)
      ->delete();

      //DELETE $aptitude
      return $apt;
    } 

}