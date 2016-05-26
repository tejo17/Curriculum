<?php

namespace App\Http\Controllers;
use App\OtherGrade;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use Auth;

class OtherGradesController extends Controller
{
public function index(){
  return view('student.profile');
}
     
   public function store(Request $request)
   {
          $grade = $request->input();
         
    try {
            $queries = \DB::table('otherGrades')
    ->join('students','otherGrades.student_id','=','students.id')
    ->where('student_id',$this->student_id)
    ->insert(['grade' => $grade['grade'],
    		  'description' => $grade['description'],
    		  'duration' => $grade['duration'],
    		  'institution' => $grade['institution'],
              'student_id' => $this->student_id,
              'created_at' => date('YmdHms'),
             ]);
    
    } catch (\Exception $e) {
      echo "Registro duplicado";
    }
    return view('student.profile');
   }

   public function listOtherGrades()
   {
     
     $queries = \DB::table('otherGrades')
    ->join('students','otherGrades.student_id','=','students.id')
    ->select('otherGrades.id','grade','description','duration','institution')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $grade 
     */

    public function destroy($grade)
    {
      
       $queries = \DB::table('otherGrades')
       ->where('id',$grade)
       ->delete();

      //DELETE $grade
      return $grade;
    } 

}
