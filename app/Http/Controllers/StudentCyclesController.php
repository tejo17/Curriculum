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
      /*Se comprueba si ya tiene insertado ese ciclo*/
       $exist = \DB::table('studentCycles')
       ->where('cycle_id',$cycle['cycle'])
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
                	                   'dateTo'          => $actual,
                	                   'city_id'         => $cycle['cityCycle'],
                	                   'student_id'      => $this->student_id,
                	                   'cycle_id'	       => $cycle['cycle'],
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
                        ->update(['center'                       => $cycle['center'],
                                 'dateFrom'                      => $cycle['dateFrom'],
                                 'dateTo'                        => $actual,
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
                
     
        // Devuelvo la vista junto con las familias
        return view('student.curriculum', compact('profFamilies', 'datos'));       
   }

   /*Listar los ciclos del estudiante*/
   public function listStudentCycles(){
     
     $queries = \DB::table('studentCycles')
    ->join('students','studentCycles.student_id','=','students.id')
    ->join('cities','studentCycles.city_id','=','cities.id')
    ->join('states','cities.state_id','=','states.id')
    ->join('cycles','studentCycles.cycle_id','=','cycles.id')
    ->join('proffamilies','cycles.profFamilie_id','=','proffamilies.id')
    ->select('cycles.level as Nivel','studentCycles.id','center','dateTo','dateFrom','cycles.name as Cycle','states.name as State','cities.name as City','proffamilies.name as Family')    ->where('student_id',$this->student_id)
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