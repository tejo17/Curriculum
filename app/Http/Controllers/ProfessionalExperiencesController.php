<?php

namespace App\Http\Controllers;
use App\ProfessionalExperience;
use App\Http\Requests\CreateProfessionalExperienceRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class ProfessionalExperiencesController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function index(){
    return view('student.profile');
   }
   public function validateEmptyForm($arrayForm)
   {

    unset($arrayForm['_token']);
    foreach ($arrayForm as $k => $v) {
    
      if (isset($v) && !empty($v)) {

          return true;

      }else{

          return false;
      }
    }

   }
   public function store(CreateProfessionalExperienceRequest $request)
   {
       $professionalExperience = $request->all();
  
         //$city_id = \DB::table('cities')->where('name' , $professionalExperience['city'])->value('id');
        /* try {
          $queries = \DB::table('ProfessionalExperiences')
          ->join('students','ProfessionalExperiences.student_id','=','students.id')
          ->where('student_id',$this->student_id)
          ->insert(['enterprise' => $professionalExperience['enterprise'],
                   'description' => $professionalExperience['description'],
                   'job'         => $professionalExperience['job'],
                   'from'        => "2013-09-09",
                   'to'          => "2015-06-09",
                   'city_id'     => 1,
                   'student_id'  => $this->student_id,
                   'created_at'  => date('YmdHms')]);
         
         }
         catch(\PDOException $e) {

         }
        */
  

        return view('student.profile',compact('professionalExperience'));
     
        
   }

   public function listProfessionalExperiences(){
     
     $queries = \DB::table('professionalExperiences')
    ->join('students','professionalExperiences.student_id','=','students.id')
    ->join('cities','professionalExperiences.city_id','=','cities.id')
    ->join('states','cities.state_id','=','states.id')
    ->select('enterprise','description','job','from','to','cities.name')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $certification 
     */

    public function destroy($professionalExperience) {

       $queries = \DB::table('professionalExperiences')->where('student_id',$this->student_id)->delete();

      //DELETE $certification
      return $professionalExperience;
    } 
}