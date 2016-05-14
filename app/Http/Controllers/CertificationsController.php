<?php

namespace App\Http\Controllers;
use App\Certification;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class CertificationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
   public function store(Request $request)
   {
       $certification = $request->input();
           
    try {
      $queries = \DB::table('certifications')
      ->join('students','certifications.student_id','=','students.id')
      ->where('student_id',$this->student_id)
      ->insert(['certification' => $certification['certification'],
               'description' => $certification['description'],
               'institution' => $certification['institution'],
               'student_id' => $this->student_id,
               'created_at' => date('YmdHms')]);
     
     }
   catch(\PDOException $e) {
    
   }
    return view('student.profile');
   }

   public function listCerificationsUsers(){
     
     $queries = \DB::table('certifications')
    ->join('students','studentlanguages.student_id','=','students.id')
    ->select('certification','description','institution')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $certification 
     */

    public function destroy($certification) {

       $queries = \DB::table('certifications')->where('student_id',$this->student_id)->delete();

      //DELETE $certification
      return $certification;
    } 
}