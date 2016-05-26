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
   public function index(){
    return view('student.profile');
   }
   public function store(Request $request)
   {
       $certification = $request->input();

        $exist =  \DB::table('certifications')
        ->where('certification',$certification['certification'])
        ->where('institution',$certification['institution'])
        ->where('description',$certification['description'])
        ->where('student_id',$this->student_id)
        ->first();
       
    try {
      if ($exist == null && $certification['id'] == 0) {
      $queries = \DB::table('certifications')
      ->join('students','certifications.student_id','=','students.id')
      ->where('student_id',$this->student_id)
      ->insert(['certification' => $certification['certification'],
               'description' => $certification['description'],
               'institution' => $certification['institution'],
               'student_id' => $this->student_id,
               'created_at' => date('YmdHms')]);
      }else{
        $queries = \DB::table('certifications')
      ->join('students','certifications.student_id','=','students.id')
      ->where('student_id',$this->student_id)
      ->where('certifications.id',$certification['id'])
      ->update(['certification' => $certification['certification'],
               'description' => $certification['description'],
               'institution' => $certification['institution'],
               'student_id' => $this->student_id]);
      }
     
     }
   catch(\PDOException $e) {
    
   }
    return view('student.profile');
   }

   public function listCerificationsUsers(){
     
     $queries = \DB::table('certifications')
    ->join('students','student_id','=','students.id')
    ->select('certifications.id','certification','description','institution')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $certification 
     */

    public function destroy($certification) {

       $queries = \DB::table('certifications')->where('id',$certification)->delete();

      //DELETE $certification
      return $certification;
    } 
}