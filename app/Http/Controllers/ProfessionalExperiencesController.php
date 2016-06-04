<?php

namespace App\Http\Controllers;
use App\ProfessionalExperience;
use App\Http\Requests\ProfessionalExperienceRequest;
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
    return view('student.curriculum');
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
   public function store(ProfessionalExperienceRequest $request)
   {
       $professionalExperience = $request->all();
        $city_id = \DB::table('cities')->where('name' , $professionalExperience['city'])->value('id');
        //dd($professionalExperience);
        if ($professionalExperience['id'] == 0) {
         try {
          $queries = \DB::table('ProfessionalExperiences')
          ->join('students','ProfessionalExperiences.student_id','=','students.id')
          ->where('student_id',$this->student_id)
          ->insert(['enterprise' => $professionalExperience['enterprise'],
                   'description' => $professionalExperience['description'],
                   'job'         => $professionalExperience['job'],
                   'from'        => $professionalExperience['from'],
                   'to'          => $professionalExperience['to'],
                   'city_id'     => $city_id,
                   'student_id'  => $this->student_id,
                   'created_at'  => date('YmdHms')]);
         
         }
         catch(\PDOException $e) {

         }
        }else{
          try {
            $queries = \DB::table('ProfessionalExperiences')
          ->join('students','ProfessionalExperiences.student_id','=','students.id')
          ->where('student_id',$this->student_id)
          ->where('ProfessionalExperiences.id',$professionalExperience['id'])
          ->update(['enterprise' => $professionalExperience['enterprise'],
                   'description' => $professionalExperience['description'],
                   'job'         => $professionalExperience['job'],
                   'from'        => $professionalExperience['from'],
                   'to'          => $professionalExperience['to'],
                   'ProfessionalExperiences.city_id'     => $city_id
                   ]);
          } catch (Exception $e) {
            
          }
        }
        
  

        return view('student.curriculum',compact('professionalExperience'));
     
        
   }

   public function listProfessionalExperiences(){
     
     $queries = \DB::table('professionalExperiences')
    ->join('students','professionalExperiences.student_id','=','students.id')
    ->join('cities','professionalExperiences.city_id','=','cities.id')
    ->join('states','cities.state_id','=','states.id')
    ->select('professionalExperiences.id','states.name as State','enterprise','description','job','from','to','cities.name as City')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $certification 
     */

    public function destroy($professionalExperience) {
      
      $queries = \DB::table('professionalExperiences')->where('id',$professionalExperience)->delete();

      //DELETE $certification
      return $professionalExperience;
    } 
}