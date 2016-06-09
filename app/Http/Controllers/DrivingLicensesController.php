<?php

namespace App\Http\Controllers;
use App\DrivingLicense;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use Auth;
use Session;

class DrivingLicensesController extends Controller
{

  public function index(){

      return view('student.curriculum');   
  }

   /*Store y Update*/
   public function store(Request $request)
   {
      $student = \DB::table('studentDrivingLicenses')->where('student_id', $this->student_id)->first();
      $id = $request->input('id');   
      $drivingLicense = $request->input('drivingLicense');

      /*Comprobar si es insert o update*/
      if($id == 0 ){

          if ($drivingLicense != null) {

                  try {

                      $licenses = implode(",", $drivingLicense);
                      $queries = \DB::table('studentDrivingLicenses')
                      ->join('students','studentDrivingLicenses.student_id','=','students.id')
                      ->where('student_id',$this->student_id)
                      ->insert(['drivingLicense' => $licenses,
                               'student_id' => $this->student_id,
                               'created_at' => date('YmdHms'),
                               ]);      
                        Session::flash('type',"success");
                        Session::flash('insert', "Permisos de conducir guardados."); 

                  }catch (\Exception $e) {
                      if($e->getCode() == 2002) {
                         Session::flash('type',"danger");
                         Session::flash('insert', "No se ha podido guardar.");
                      } else {
                         Session::flash('type',"danger");
                         Session::flash("insert","Modifica tus permisos ya guardados.");
                      }
                   }

          }else{
              Session::flash('type',"danger");
              Session::flash('insert', "No has guardado ningún permiso de conducir");
          }
      //UPDATE
      }else{

           try {
              /*Separar el conjunto de licencias*/
              $licenses = implode(",", $drivingLicense);

              $queries = \DB::table('studentDrivingLicenses')
                      ->join('students','studentDrivingLicenses.student_id','=','students.id')
                      ->where('student_id',$this->student_id)
                      ->update(['drivingLicense' => $licenses,
                               'student_id' => $this->student_id,
                               ]);
              Session::flash('type',"success");
              Session::flash('insert', "Registro permiso de conducir actualizado");

          }catch (\Exception $e) {
                if($e->getCode() == 2002) {
                 Session::flash('type',"danger");
                 Session::flash('insert', "No se ha podido actualizar.");
               } 
           }  


      }

     return redirect('estudiante/curriculum'); 
  }

  /*Listar licencias del usuario*/
  public function listLicenses(){
      
        $queries = \DB::table('studentDrivingLicenses')
       ->join('students','studentDrivingLicenses.student_id','=','students.id')
       ->where('student_id',$this->student_id)
       ->select('studentDrivingLicenses.id','drivingLicense','student_id')
       ->get();

      return Response::json($queries);    
   }

    /**
     * Eliminar licencias
     * @param  String $drivingLicense 
     */

    public function destroy($drivingLicense)
    {

       $queries = \DB::table('studentDrivingLicenses')
       ->where('student_id',$this->student_id)
       ->delete();
        Session::flash('type',"warning");
        Session::flash('insert', "Registro permiso de conducir eliminado");

        //DELETE $drivingLicense
       return $drivingLicense;
   } 
 }
