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
       $cycle = $request->all();
       $city_id = \DB::table('cities')->where('name' , $cycle['cityCycle'])->value('id');
       $cycle_id = \DB::table('cycles')->where('name' , $cycle['cycle'])->value('id');

      /*Se comprueba si ya tiene insertado ese ciclo*/
       $exist = \DB::table('studentCycles')
       ->where('cycle_id',$cycle_id)
       ->where('student_id',$this->student_id)
       ->first();

              /*Store*/
               if ($cycle['id'] == 0) {

                  if($exist == null){
                    
              	         try {
                 
                	          $queries = \DB::table('studentCycles')
                	          ->join('students','studentCycles.student_id','=','students.id')
                	          ->where('student_id',$this->student_id)
                	          ->insert(['center'         => $cycle['center'],
                	                   'dateFrom'        => $cycle['dateFrom'],
                	                   'dateTo'          => $cycle['dateTo'],
                	                   'city_id'         => $city_id,
                	                   'student_id'      => $this->student_id,
                	                   'cycle_id'	       => $cycle_id,
                	                   'created_at'      => date('YmdHms'),
                                     ]);

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
                        ->update(['center' => $cycle['center'],
                                 'otherFormations' => $cycle['otherFormations'],
                                 'from'            => $cycle['dateFrom'],
                                 'to'              => $cycle['dateTo'],
                                 'city_id'         => $city_id,
                                 'student_id'      => $this->student_id,
                                 'cycle_id'	       => $cycle_id,
                                 'created_at'      => date('YmdHms'),
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
                
        
      return view('student.curriculum',compact('cycle'));       
   }

   /*Listar los ciclos del estudiante*/
   public function listStudentCycles(){
     
     $queries = \DB::table('studentCycles')
    ->join('students','studentCycles.student_id','=','students.id')
    ->join('cities','studentCycles.city_id','=','cities.id')
    ->join('states','cities.state_id','=','states.id')
    ->join('cycles','studentCycles.cycle_id','=','cycles.id')
    ->join('proffamilies','cycles.profFamilie_id','=','proffamilies.id')
    ->select('studentCycles.id','center','dateTo','dateFrom','cycles.name as Cycle','states.name as State','cities.name as City')    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * Eliminar ciclo de un usuario
     * @param  String $cycle 
     */

    public function destroy($cycle) {
      
      $queries = \DB::table('studentCycles')->where('id',$cycle)->delete();

      //DELETE $cycle
      return $cycle;
    } 
}