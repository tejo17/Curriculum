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
         return view('student.profile');   
       }

 public function store(Request $request)
 {
  $student = \DB::table('studentDrivingLicenses')->where('student_id', $this->student_id)->first();
  $id = $request->input('id');   
  $drivingLicense = $request->input('drivingLicense');

 if($id == 0 ){
  if ($drivingLicense != null) {
    if ($student == null) {
  $licenses = implode(",", $drivingLicense);
          $queries = \DB::table('studentDrivingLicenses')
          ->join('students','studentDrivingLicenses.student_id','=','students.id')
          ->where('student_id',$this->student_id)
          ->insert(['drivingLicense' => $licenses,
                   'student_id' => $this->student_id,
                   'created_at' => date('YmdHms'),
                   ]);      
                   Session::put('type',"success");
     Session::put('insert', "Registro permiso de conducir insertado"); 
      
    }else{
    Session::put('type',"danger");
     Session::put('insert', "Este estudiante ya tiene un registro de permisos");
    }
  }else{
   
    Session::put('type',"danger");
     Session::put('insert', "Debes marcar un permiso de conducir");
  }

}else{
  $licenses = implode(",", $drivingLicense);

  $queries = \DB::table('studentDrivingLicenses')
          ->join('students','studentDrivingLicenses.student_id','=','students.id')
          ->where('student_id',$this->student_id)
          ->update(['drivingLicense' => $licenses,
                   'student_id' => $this->student_id,
                   ]);
          Session::put('type',"success");
     Session::put('insert', "Registro permiso de conducir actualizado");
  }
return view('student.profile');
}


public function listLicenses(){
    
      $queries = \DB::table('studentDrivingLicenses')
     ->join('students','studentDrivingLicenses.student_id','=','students.id')
     ->where('student_id',$this->student_id)
     ->select('studentDrivingLicenses.id','drivingLicense','student_id')
     ->get();
    return Response::json($queries);    
   }

    /**
     * @param  String $drivingLicense 
     */

    public function destroy($drivingLicense)
    {

     $queries = \DB::table('studentDrivingLicenses')
     ->where('student_id',$this->student_id)
     ->delete();
      Session::put('type',"warning");
     Session::put('insert', "Registro permiso de conducir eliminado");
      //DELETE $drivingLicense
     return $drivingLicense;
   } 
 }
