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

 public function store(Request $request)
 {
    $id = $request->input('id');   
  $license_id = $request->input('drivingLicense');
 
/*  if($id == 0 && $license_id != null ){
*/   foreach ($license_id as $key => $value) {
  try { 

     $queries = \DB::table('studentDrivingLicenses')
     ->join('drivingLicenses','studentDrivingLicenses.license_id','=','drivingLicenses.id')
     ->join('students','studentDrivingLicenses.student_id','=','students.id')
     ->where('student_id',$this->student_id)
     ->where('license_id',$license_id)
     ->insert(['license_id' => $value,
      'student_id' => $this->student_id,
      'created_at' => date('YmdHms'),
      ]);
    }catch(Exception $e) {
  dd('Seleccione al menos un campo');  
    }
   }


 /*}else{

  dd('Campo editado');  

}*/
return view('student.profile');
}


public function listLicenses(){
    
      $queries = \DB::table('studentDrivingLicenses')
     ->join('drivingLicenses','studentDrivingLicenses.license_id','=','drivingLicenses.id')
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

      //DELETE $drivingLicense
     return $drivingLicense;
   } 
 }
