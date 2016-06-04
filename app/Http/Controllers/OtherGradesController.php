<?php

namespace App\Http\Controllers;
use App\OtherGrade;
use App\Http\Requests\OtherGradesRequest;
use Illuminate\Http\Request;
use Response;
use Auth;
use Session;

class OtherGradesController extends Controller
{
  public function index(){
    return view('student.curriculum');
  }
     
    /*Guardar o actualizar*/
   public function store(OtherGradesRequest $request)
   {
          $grade = $request->input();
          $exist = \DB::table('otherGrades')
          ->where('grade',$grade['grade'])
          ->where('student_id',$this->student_id)
          ->first();
         

        if($exist == null){

            if ($grade['id'] == 0) {

                  try {
                    $queries = \DB::table('otherGrades')
                    ->join('students','otherGrades.student_id','=','students.id')
                    ->where('student_id',$this->student_id)
                    ->insert(['grade' => $grade['grade'],
                              'description' => $grade['descriptionGrade'],
                              'duration' => $grade['duration'],
                              'institution' => $grade['studyCenter'],
                              'student_id' => $this->student_id,
                              'created_at' => date('YmdHms'),
                              ]);
                    Session::flash('type',"success");
                    Session::flash('insert', "Curso guardado.");

                 }catch (\Exception $e) {
                     if($e->getCode() == 2002) {
                         Session::flash('type',"danger");
                         Session::flash('insert', "No se ha podido guardar.");
                     } 
                 }
              
        
            } else{

                try {

                    $queries = \DB::table('otherGrades')
                    ->join('students','otherGrades.student_id','=','students.id')
                    ->where('student_id',$this->student_id)
                    ->where('otherGrades.id',$grade['id'])
                    ->update(['grade' => $grade['grade'],
                              'description' => $grade['descriptionGrade'],
                              'duration' => $grade['duration'],
                              'institution' => $grade['studyCenter'],
                              'student_id' => $this->student_id,
                              
                             ]);
                    Session::flash('type',"success");
                    Session::flash('insert', "Curso actualizado.");

              }catch (\Exception $e) {
                    if($e->getCode() == 2002) {
                     Session::flash('type',"danger");
                     Session::flash('insert', "No se ha podido actualizar.");
                   } 
               }  
            }
        }else{
            Session::flash('type',"danger");
            Session::flash("insert","Ya tienes guardado ese curso.");
        }

      
    return view('student.curriculum');
   }

   /*Listar otros cursos del usuario*/
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
     * Eliminar
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
