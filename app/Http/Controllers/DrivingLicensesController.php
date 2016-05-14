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
    
    $license_id = $request->input('drivingLicense');

    try{
    	foreach ($license_id as $key => $value) {

	    	 $queries = \DB::table('studentDrivingLicenses')
	    ->join('drivingLicenses','studentDrivingLicenses.license_id','=','drivingLicenses.id')
	    ->join('students','studentDrivingLicenses.student_id','=','students.id')
	    ->where('student_id',$this->student_id)
	    ->insert(['license_id' => $value,
	             'student_id' => $this->student_id,
	             'created_at' => date('YmdHms'),
	             ]);
   		 }
    } catch(\PDOException $e) {
    
        Session::flash('fail', 'TU puta madre');  

    }
    
    return view('student.profile');
   }


    /*public function listSitesUsers(){
    
     $queries = \DB::table('studentPersonalSites')
    ->join('personalSites','studentPersonalSites.site_id','=','personalSites.id')
    ->join('students','studentPersonalSites.student_id','=','students.id')
    ->select('personalSite')
    ->where('student_id',$this->student_id)
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
