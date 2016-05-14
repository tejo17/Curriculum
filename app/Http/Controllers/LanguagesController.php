<?php

namespace App\Http\Controllers;
use App\Language;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class LanguagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function getLanguage()
    {
        $queries = \DB::table('languages')
        	->orderBy('language')
          ->get();
                   
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->language];
        }
        return Response::json($results);
   }
   
   public function store(Request $request)
   {
    $id_query = $request->input('id');
          $user_id = \Auth::user()->id;
          $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
      $language = $request->input();
          $language_id = \DB::table('languages')->where('language' , $language['language'])->value('id');
    if ($id_query == 0) {
           
    try {
      $queries = \DB::table('studentlanguages')
      ->join('languages','studentlanguages.language_id','=','languages.id')
      ->join('students','studentlanguages.student_id','=','students.id')
      ->where('student_id',$student_id)
      ->insert(['readingComprehension' => $language['readingComprehension'],
               'WrittedExpression' => $language['WrittedExpression'],
               'listeningComprehension' => $language['listeningComprehension'],
               'oralExpression' => $language['oralExpression'],
               'language_id' => $language_id,
               'student_id' => $student_id,
               'created_at' => date('YmdHms')]);     
     }
   catch(\PDOException $e) {
     
   }
 }else{
  $queries = \DB::table('studentlanguages')
      ->join('languages','studentlanguages.language_id','=','languages.id')
      ->join('students','studentlanguages.student_id','=','students.id')
      ->where('student_id',$student_id)
      ->where('studentlanguages.id',$id_query)
      ->update(['readingComprehension' => $language['readingComprehension'],
               'WrittedExpression' => $language['WrittedExpression'],
               'listeningComprehension' => $language['listeningComprehension'],
               'oralExpression' => $language['oralExpression'],
               'language_id' => $language_id,
               'student_id' => $student_id]);
 }
  return view('student.profile');
}



   public function listlanguagesuser()
   {
    $user_id = \Auth::user()->id;
    $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
     
     $queries = \DB::table('studentlanguages')
    ->join('languages','studentlanguages.language_id','=','languages.id')
    ->join('students','studentlanguages.student_id','=','students.id')
    ->select('studentlanguages.id','language','readingComprehension','WrittedExpression','listeningComprehension','oralExpression')
    ->where('student_id',$student_id)
    ->get();

    return Response::json($queries);
    
   }

   /**
     * @param  String $lang 
     */

    public function destroy($lang) 
    {
       $user_id = \Auth::user()->id;
     $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
     $language_id = \DB::table('languages')->where('language',$lang)->value('id');
      $queries = \DB::table('studentlanguages')->where('language_id',$language_id)->where('student_id',$student_id)->delete();

      //DELETE $lang
      return $lang;
    } 
}