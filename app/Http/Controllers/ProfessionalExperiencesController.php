<?php

namespace App\Http\Controllers;
use App\ProfessionalExperience;
use App\Http\Requests\ProfessionalExperienceRequest;
use Illuminate\Http\Request;
use Response;
use Session;

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

   /*Ahora mismo sin usar
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

   }*/

   /*Insertar o actualizar. En esta inserción, no se ha controlado si ya existe porque pueden haber muchas
      variaciones, es decir, una persona puede trabajar en X empresa de electricista, salirse dos meses a otro
       sitio a trabajar y volver a la empresa anterior con el mismo puesto de trabajo, lo único que podrían variar
       son las fechas.*/
   public function store(ProfessionalExperienceRequest $request)
   {
        /*Se recuperarn los datos del form y se obtiene el id de la ciudad*/
        $professionalExperience = $request->all();

        /*Insertar (Id hidden)*/
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
                     'city_id'     => $professionalExperience['city'],
                     'student_id'  => $this->student_id,
                     'created_at'  => date('YmdHms')]);
             Session::flash('type',"success");
             Session::flash("insert","Trabajo guardado.");
           
           }catch(\PDOException $e) {
             if($e->getCode() == 2002) {
               Session::flash('type',"danger");
               Session::flash('insert', "No se ha podido guardar.");
             }  
           }
        /*Actualizar*/
        }else{
          try {
              $queries = \DB::table('ProfessionalExperiences')
              ->join('students','ProfessionalExperiences.student_id','=','students.id')
              ->where('student_id',$this->student_id)
              ->where('ProfessionalExperiences.id',$professionalExperience['id'])
              ->update(['enterprise'                        => $professionalExperience['enterprise'],
                       'description'                        => $professionalExperience['description'],
                       'job'                                => $professionalExperience['job'],
                       'from'                               => $professionalExperience['from'],
                       'to'                                 => $professionalExperience['to'],
                       'ProfessionalExperiences.city_id'    => $professionalExperience['city'],
                       'ProfessionalExperiences.updated_at'  => date('YmdHms')
                       ]);
              Session::flash('type',"success");
              Session::flash('insert', "Trabajo modificado");
          } catch (Exception $e) {
            if($e->getCode() == 2002) {
               Session::flash('type',"danger");
               Session::flash('insert', "No se ha podido actualizar.");
             }  
          }
        }

         return redirect('estudiante/curriculum'); 
        
   }

   /*Listar trabajos del usuario*/
   public function listProfessionalExperiences(){
     
     $queries = \DB::table('professionalExperiences')
    ->join('students','professionalExperiences.student_id','=','students.id')
    ->join('cities','professionalExperiences.city_id','=','cities.id')
    ->join('states','cities.state_id','=','states.id')
    ->select('professionalExperiences.id','states.name as State','enterprise','description','job','from','to','cities.name as City')
    ->where('student_id',$this->student_id)
    ->orderBy('from')
    ->get();

    return Response::json($queries);
    
   }

   /**
     * Eliminar trabajo
     * @param  String $professionalExperience 
     */

    public function destroy($professionalExperience) {
      
      $queries = \DB::table('professionalExperiences')->where('id',$professionalExperience)->delete();

       Session::flash('type',"warning");
       Session::flash('insert', "Conjunto de experiencia profesional eliminado.");
      //DELETE $certification

    } 
}