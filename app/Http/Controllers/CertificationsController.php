<?php

namespace App\Http\Controllers;
use App\Certification;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use Session;

class CertificationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function index(){
      return view('student.profile');
   }

   /*Store o Update*/
   public function store(Request $request)
   {
       $certification = $request->input();

        $exist =  \DB::table('certifications')
        ->where('certification',$certification['certification'])
        ->where('institution',$certification['institution'])
        ->where('description',$certification['description'])
        ->where('student_id',$this->student_id)
        ->first();

        /*Evitar duplicidad y comprobar si es store o update*/
        if($exist == null){

            if ($certification['id'] == 0) {

                try {

                    $queries = \DB::table('certifications')
                    ->join('students','certifications.student_id','=','students.id')
                    ->where('student_id',$this->student_id)
                    ->insert(['certification' => $certification['certification'],
                             'description' => $certification['description'],
                             'institution' => $certification['institution'],
                             'student_id' => $this->student_id,
                             'created_at' => date('YmdHms')]);
                    Session::flash('type',"success");
                    Session::flash('insert', "Certificación guardada.");
                }catch (\Exception $e) {
                     if($e->getCode() == 2002) {
                         Session::flash('type',"danger");
                         Session::flash('insert', "No se ha podido guardar.");
                     } 
                }
            }else{
               try {
                  $queries = \DB::table('certifications')
                  ->join('students','certifications.student_id','=','students.id')
                  ->where('student_id',$this->student_id)
                  ->where('certifications.id',$certification['id'])
                  ->update(['certification' => $certification['certification'],
                           'description' => $certification['description'],
                           'institution' => $certification['institution'],
                           'student_id' => $this->student_id]);
                  Session::flash('type',"success");
                  Session::flash('insert', "Certificación actualizada.");

              }catch (\Exception $e) {
                    if($e->getCode() == 2002) {
                     Session::flash('type',"danger");
                     Session::flash('insert', "No se ha podido actualizar.");
                   } 
               }  
            }
           
        }else{
            Session::flash('type',"danger");
            Session::flash("insert","Ya tienes guardado ese certificado.");
        }
               
    return view('student.profile');
   }

   /*Listar certificaciones del usuario*/
   public function listCerificationsUsers(){
     
     $queries = \DB::table('certifications')
    ->join('students','student_id','=','students.id')
    ->select('certifications.id','certification','description','institution')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * Eliminar certifiación del usuario
     * @param  String $certification 
     */

    public function destroy($certification) {

       $queries = \DB::table('certifications')->where('id',$certification)->delete();
       Session::flash('type',"warning");
       Session::flash('insert', "Certificación eliminada.");
      //DELETE $certification
      return $certification;
    } 
}