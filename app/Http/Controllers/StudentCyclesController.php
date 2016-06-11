<?php

namespace App\Http\Controllers;
use App\StudentCycle;
use App\Http\Requests\StudentCycleRequest;
use Illuminate\Http\Request;
use Response;
use Session;

class StudentCyclesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
      return view('student.curriculum');
    }
    
    /*Insertar o actualizar ciclo del estudiante*/
    public function store(StudentCycleRequest $request)
    {

      /*Se obtiene los datos del form, se obtiene el id de la ciudad y del ciclo*/
      $actual = ""; 
      $cycle = $request->all();

      if ($cycle['actualForm'] == "cursando") {
       $actual = "0000";
     }else{
      $actual = $cycle['dateTo'];
    }
    if ($cycle['carrer'] != "") {
      $cycle['cycle'] = null;

      $exist = \DB::table('studentCycles')
      ->where('carreer',$cycle['carrer'])
      ->where('student_id',$this->student_id)
      ->first();

    }else{
      /*Se comprueba si ya tiene insertado ese ciclo*/
      $exist = \DB::table('studentCycles')
      ->where('cycle_id',$cycle['cycle'])
      ->where('student_id',$this->student_id)
      ->first();
    }


    /*Store*/
    if ($cycle['id'] == 0) {

      if($exist == null){

       $queries = \DB::table('studentCycles')
       ->join('students','studentCycles.student_id','=','students.id')
       ->where('student_id',$this->student_id)
       ->insert(['center'         => $cycle['center'],
        'dateFrom'        => $cycle['dateFrom'],
        'dateTo'          => $actual,
        'carreer'         => $cycle['carrer'],
        'city_id'         => $cycle['cityCycle'],
        'student_id'      => $this->student_id,
        'cycle_id'	       => $cycle['cycle'],
        'created_at'      => date('YmdHms'),
        ]);
       try {


         Session::flash('type',"success");
         Session::flash('insert', "Ciclo guardado.");
         
       }catch (\Exception $e) {

         Session::flash('type',"danger");
         Session::flash('insert', "No se ha podido guardar.");
         
       }

     }else{
      Session::flash('type',"danger");
      Session::flash("insert","Ya tienes guardado ese ciclo.");
    }

    /*Update*/
  }else{
    try {
      $queries = \DB::table('studentCycles')
      ->join('students','studentCycles.student_id','=','students.id')
      ->where('student_id',$this->student_id)
      ->where('studentCycles.id',$cycle['id'])
      ->update([
        'center'                       => $cycle['center'],
        'dateFrom'                      => $cycle['dateFrom'],
        'dateTo'                        => $actual,
        'carreer'                       => $cycle['carrer'],
        'studentCycles.city_id'         => $cycle['cityCycle'],
        'student_id'                    => $this->student_id,
        'cycle_id'	                     => $cycle['cycle'],
        'studentCycles.updated_at'      => date('YmdHms')
        ]);

      
      Session::flash('type',"success");
      Session::flash('insert', "Ciclo actualizado.");

    }catch (\Exception $e) {
      if($e->getCode() == 2002) {
       Session::flash('type',"danger");
       Session::flash('insert', "No se ha podido actualizar.");
     } 
   }  
 }     
 return redirect('estudiante/curriculum');       
}

/*Listar los ciclos del estudiante*/
public function listStudentCycles(){
  
  $queries1 = \DB::table('studentCycles')
  ->join('students','studentCycles.student_id','=','students.id')
  ->join('cities','studentCycles.city_id','=','cities.id')
  ->join('states','cities.state_id','=','states.id')
  ->select('studentCycles.id','center','dateTo','dateFrom','states.name as State','cities.name as City','carreer')->where('student_id',$this->student_id)->where('cycle_id',null)
  ->get();

  $queries = \DB::table('studentCycles')
  ->join('students','studentCycles.student_id','=','students.id')
  ->join('cities','studentCycles.city_id','=','cities.id')
  ->join('states','cities.state_id','=','states.id')
  ->join('cycles','studentCycles.cycle_id','=','cycles.id')
  ->join('proffamilies','cycles.profFamilie_id','=','proffamilies.id')
  ->select('cycles.level as Nivel','studentCycles.id','center','dateTo','dateFrom','cycles.name as Cycle','states.name as State','cities.name as City','proffamilies.name as Family','carreer')->where('student_id',$this->student_id)
  ->get();
  $consulta = array(
    'carrera' => $queries1,
    'ciclo' => $queries,);
  

  return Response::json($consulta);
  
}

   /**
     * Eliminar ciclo de un usuario
     * @param  String $cycle 
     */

   public function destroy($cycle) {

    $queries = \DB::table('studentCycles')->where('id',$cycle)->delete();

    Session::flash('type',"warning");
    Session::flash('insert', "Conjunto de educación y formación eliminado.");

      //DELETE $cycle
    return $cycle;
  } 
}