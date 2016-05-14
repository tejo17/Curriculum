<?php

namespace App\Http\Controllers;
use App\OtherGrade;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use Auth;

class OtherGradesController extends Controller
{

     
   public function store(Request $request){
          $grade = $request->input();
          $user_id = Auth::user()->id;
          $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
 

    try {
            $queries = \DB::table('otherGrades')
    ->join('students','otherGrades.student_id','=','students.id')
    ->where('student_id',$student_id)
    ->insert(['grade' => $grade['grade'],
    		  'description' => $grade['description'],
    		  'duration' => $grade['duration'],
    		  'institution' => $grade['institution'],
              'student_id' => $student_id,
              'created_at' => date('YmdHms'),
             ]);
    
    } catch (\Exception $e) {
      echo "Registro duplicado";
    }
    return view('student.profile');
   }

   public function listOtherGrades(){
    $user_id = \Auth::user()->id;
    $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
     
     $queries = \DB::table('otherGrades')
    ->join('students','otherGrades.student_id','=','students.id')
    ->select('grade','description','duration','institution')
    ->where('student_id',$student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $lang 
     */

    public function destroy($grade) {
       $user_id = \Auth::user()->id;
       $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
       $queries = \DB::table('otherGrades')->where('student_id',$student_id)->delete();

      //DELETE $grade
      return $grade;
    } 

}
