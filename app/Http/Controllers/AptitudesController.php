<?php

namespace App\Http\Controllers;
use App\Aptitude;
use App\Http\Requests\AptitudeRequest;
use Illuminate\Http\Request;
use Response;
use Session;

class AptitudesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
      return view('student.curriculum');
    }
    /*Store y Update*/
   public function store(AptitudeRequest $request){

        $aptitude = $request->input();
        $exist = \DB::table('aptitudes')
        ->where('aptitude',$aptitude['aptitude'])
        ->where('student_id',$this->student_id)
        ->first();

        /*Comprobar si es insert o update y evitar duplicados*/
        

            if($aptitude['id'] == 0 ){

                  if ($exist == null) {
                    /*Comprobar que no está vacío.*/

                        try {
                           $queries = \DB::table('aptitudes')
                            ->join('students','aptitudes.student_id','=','students.id')
                            ->where('student_id',$this->student_id)
                            ->insert(['aptitude' => $aptitude['aptitude'],
                                     'student_id' => $this->student_id,
                                     'created_at' => date('YmdHms')]);  
                            Session::flash('type',"success");
                            Session::flash('insert', "Conjunto de aptitudes guardado.");
                            
                        }catch (\Exception $e) {
                            if($e->getCode() == 2002) {
                               Session::flash('type',"danger");
                               Session::flash('insert', "No se ha podido guardar.");
                            } 
                         }
                   }else{
                        Session::flash('type',"danger");
                        Session::flash("insert","Ya tienes guardado ese conjunto de aptitudes.");
                  }

              }else{

                  try {
                    $queries = \DB::table('aptitudes')
                    ->join('students','aptitudes.student_id','=','students.id')
                    ->where('student_id',$this->student_id)
                    ->where('aptitudes.id',$aptitude['id'])
                    ->update(['aptitude' => $aptitude['aptitude']]); 
                     Session::flash('type',"success");
                     Session::flash('insert', "Conjunto de aptitudes actualizado.");

                  }catch (\Exception $e) {
                      if($e->getCode() == 2002) {
                       Session::flash('type',"danger");
                       Session::flash('insert', "No se ha podido actualizar.");
                     } 
                  }  
              }
   
    return view('student.curriculum');
  }

    /*Listar aptitudes del usuario*/
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
     * Eliminar conjunto de aptitudes
     */

    public function destroy($apt)
    {    
      $queries = \DB::table('aptitudes')
      ->where('id',$apt)
      ->where('student_id',$this->student_id)
      ->delete();
       Session::flash('type',"warning");
       Session::flash('insert', "Conjunto de aptitudes eliminado.");
      //DELETE $aptitude
      return $apt;
    } 

}