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
          $exist = \DB::table('otherGrades')
          ->where('grade',$grade['grade'])
          ->where('description',$grade['description'])
          ->where('duration',$grade['duration'])
          ->where('institution',$grade['studyCenter'])
          ->where('student_id',$this->student_id)
          ->first();

         
    try {
      if($exist == null && $grade['id'] == 0 )
      {
        if ($grade['grade'] != "" && $grade['studyCenter'] != "" && $grade['duration'] != "" ) {
            $queries = \DB::table('otherGrades')
    ->join('students','otherGrades.student_id','=','students.id')
    ->where('student_id',$this->student_id)
    ->insert(['grade' => $grade['grade'],
          'description' => $grade['description'],
          'duration' => $grade['duration'],
          'institution' => $grade['studyCenter'],
              'student_id' => $this->student_id,
              'created_at' => date('YmdHms'),
             ]);
            
        }
  } else{

            $queries = \DB::table('otherGrades')
    ->join('students','otherGrades.student_id','=','students.id')
    ->where('student_id',$this->student_id)
    ->where('otherGrades.id',$grade['id'])
    ->update(['grade' => $grade['grade'],
          'description' => $grade['description'],
          'duration' => $grade['duration'],
          'institution' => $grade['studyCenter'],
              'student_id' => $this->student_id,
              
             ]);
  }   
    
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
