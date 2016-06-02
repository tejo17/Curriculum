<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class StudentCyclesController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function index(){
    return view('student.profile');
   }
   
   public function store(Request $request)
   {
       $cycle = $request->all();
       $city_id = \DB::table('cities')->where('name' , $cycle['city'])->value('id');
       $cycle_id = \DB::table('cycles')->where('name' , $cycle['cycle'])->value('id');

        if ($cycle['id'] == 0) {
	         try {
	          $queries = \DB::table('studentCycles')
	          ->join('students','studentCycles.student_id','=','students.id')
	          ->where('student_id',$this->student_id)
	          ->insert(['center' => $cycle['center'],
	                   'otherFormations' => $cycle['otherFormations'],
	                   'from'        => $cycle['dateFrom'],
	                   'to'          => $cycle['dateTo'],
	                   'city_id'     => $city_id,
	                   'student_id'  => $this->student_id,
	                   'cycle_id'	 => $cycle_id,
	                   'created_at'  => date('YmdHms')]);
	         
	         }
	         catch(\PDOException $e) {

	         }
        }else{
          try {
            $queries = \DB::table('studentCycles')
          ->join('students','studentCycles.student_id','=','students.id')
          ->where('student_id',$this->student_id)
          ->where('studentCycles.id',$cycle['id'])
          ->update(['center' => $cycle['center'],
                   'otherFormations' => $cycle['otherFormations'],
                   'from'        => $cycle['dateFrom'],
                   'to'          => $cycle['dateTo'],
                   'city_id'     => $city_id,
                   'student_id'  => $this->student_id,
                   'cycle_id'	 => $cycle_id,
                   'created_at'  => date('YmdHms'),
                   ]);
          } catch (Exception $e) {
            
          }
        }
        
  

        return view('student.profile',compact('cycle'));
     
        
   }

   public function listStudentCycles(){
     
     $queries = \DB::table('studentCycles')
    ->join('students','studentCycles.student_id','=','students.id')
    ->join('cities','studentCycles.city_id','=','cities.id')
    ->join('states','cities.state_id','=','states.id')
    ->select('studentCycles.id','states.name as State','enterprise','description','job','from','to','cities.name as City')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $certification 
     */

    public function destroy($cycle) {
      
      $queries = \DB::table('studentCycles')->where('id',$cycle)->delete();

      //DELETE $certification
      return $cycle;
    } 
}