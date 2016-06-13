<?php

namespace App\Http\Controllers;
use App\Language;
use App\Http\Requests\LanguageRequest;
use Illuminate\Http\Request;
use Response;
use Session;

class LanguagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
   public function index(){
     return view('student.curriculum');   
   }
   
   public function show(){
     return view('student.curriculum');   
   }

   /*Obtener los idiomas de la base de datos*/
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

  /*Almacenar o actualizar el idioma de un usuario*/
   public function store(LanguageRequest $request)
   {
      /*Input oculto para distinguir entre store y update*/
      $id_query = $request->input('id');
      $language = $request->input();
      $language_id = \DB::table('languages')->where('language' , $language['language'])->value('id');

      if ($id_query == 0) {
             
        try {
          $queries = \DB::table('studentlanguages')
          ->join('languages','studentlanguages.language_id','=','languages.id')
          ->join('students','studentlanguages.student_id','=','students.id')
          ->where('student_id',$this->student_id)
          ->insert(['readingComprehension' => $language['readingComprehension'],
                   'WrittedExpression' => $language['WrittedExpression'],
                   'listeningComprehension' => $language['listeningComprehension'],
                   'oralExpression' => $language['oralExpression'],
                   'language_id' => $language_id,
                   'student_id' => $this->student_id,
                   'created_at' => date('YmdHms')]);  
            Session::flash('type',"success");
            Session::flash("insert","Idioma guardado");

       }
     catch(\PDOException $e) {
      if($e->getCode() == 2002) {
         Session::flash('type',"danger");
         Session::flash('insert', "No se ha podido guardar el idioma.");
      } else {
         Session::flash('type',"danger");
         Session::flash("insert","Ya tienes guardado ese idioma");
      }
     }
   }else{
      try {
        $queries = \DB::table('studentlanguages')
            ->join('languages','studentlanguages.language_id','=','languages.id')
            ->join('students','studentlanguages.student_id','=','students.id')
            ->where('student_id',$this->student_id)
            ->where('studentlanguages.id',$id_query)
            ->update(['readingComprehension' => $language['readingComprehension'],
                     'WrittedExpression' => $language['WrittedExpression'],
                     'listeningComprehension' => $language['listeningComprehension'],
                     'oralExpression' => $language['oralExpression'],
                     'language_id' => $language_id,
                     'student_id' => $this->student_id]);
           Session::flash('type',"success");
           Session::flash('insert', "Idioma modificado");

     } catch(\PDOException $e) {
        if($e->getCode() == 2002) {
           Session::flash('type',"danger");
           Session::flash('insert', "No se ha podido guardar el debido a un problema de comunicación.");
          } 
      }
   }
   return redirect('estudiante/curriculum');   
}

  /*Función para recuperar los idiomas del usuario*/
   public function listlanguagesuser()
   {
     $queries = \DB::table('studentlanguages')
    ->join('languages','studentlanguages.language_id','=','languages.id')
    ->join('students','studentlanguages.student_id','=','students.id')
    ->select('studentlanguages.id','language','readingComprehension','WrittedExpression','listeningComprehension','oralExpression')
    ->where('student_id',$this->student_id)
    ->get();

    return Response::json($queries);
   }

   /**
     * Eliminar un idioma de un usuario
     * @param  String $lang 
     */

    public function destroy($lang) 
    {
      $language_id = \DB::table('languages')->where('language',$lang)->value('id');
      $queries = \DB::table('studentlanguages')->where('language_id',$language_id)->where('student_id',$this->student_id)->delete();   
      Session::flash('type',"warning");
      Session::flash('insert', "Idioma eliminado.");
      return view('student.curriculum');  
    } 
}