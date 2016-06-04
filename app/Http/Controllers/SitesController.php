<?php

namespace App\Http\Controllers;
use App\PersonalSite;
use App\Http\Requests\PersonalSiteRequest;
use Illuminate\Http\Request;
use Response;
use Auth;
use Session;

class SitesController extends Controller
{

  public function index()
  {
    return view('student.curriculum');
  }

    /*Obtener los sitios personales.*/
    public function getName()
    {
        $queries = \DB::table('personalsites')
            ->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->site];
        }
        return Response::json($results);
   }

   /*Store y Update*/
   public function store(PersonalSiteRequest $request)
   {
      $account = $request->input('personalsite');
      $site = $request->input('site');
      $site_id = \DB::table('personalsites')->where('site' , $site)->value('id');
      
       /*Se comprueba si ya tiene insertado ese sitio personal*/
       $exist = \DB::table('studentPersonalSites')
       ->where('personalsite',$account)
       ->where('student_id',$this->student_id)
       ->first();

      if($request->input('id') == 0){

          if($exist == null){

              try {
                 $queries = \DB::table('studentPersonalSites')
                ->join('personalSites','studentPersonalSites.site_id','=','personalSites.id')
                ->join('students','studentPersonalSites.student_id','=','students.id')
                ->where('student_id',$this->student_id)
                ->insert(['personalSite' => $account,
                         'site_id' => $site_id,
                         'student_id' => $this->student_id,
                         'created_at' => date('YmdHms'),
                         ]);
                Session::flash('type',"success");
                Session::flash("insert","Sitio personal guardado.");
            
              } catch (\Exception $e) {
                  if($e->getCode() == 2002) {
                     Session::flash('type',"danger");
                     Session::flash('insert', "No se ha podido guardar el sitio personal.");
                  } 
               }

          }else{
                Session::flash('type',"danger");
                Session::flash("insert","Ya tienes guardada esa cuenta.");
          }
              
      }else{

        try {
           $queries = \DB::table('studentPersonalSites')
          ->join('personalSites','studentPersonalSites.site_id','=','personalSites.id')
          ->join('students','studentPersonalSites.student_id','=','students.id')
          ->where('studentpersonalsites.id',$request->input('id'))
          ->update(['personalSite' => $account,
                   'site_id' => $site_id,
                   'student_id' => $this->student_id,
                   ]);
           Session::flash('type',"success");
           Session::flash('insert', "Sitio personal modificado");
         }catch(\PDOException $e) {
          if($e->getCode() == 2002) {
             Session::flash('type',"danger");
             Session::flash('insert', "No se ha podido guardar el debido a un problema de comunicación.");
            } 
        }

      }   
    
    return view('student.curriculum');
   }

   /*Listar los sitios personales del usuario*/
    public function listSitesUsers(){
    
       $queries = \DB::table('studentPersonalSites')
      ->join('personalSites','studentPersonalSites.site_id','=','personalSites.id')
      ->join('students','studentPersonalSites.student_id','=','students.id')
      ->select('site','personalSite','studentPersonalSites.id')
      ->where('student_id',$this->student_id)
      ->get();

      return Response::json($queries);
    
   }

    /**
     * Eliminar sitio personal del usuario
     * @param  String $site 
     */

    public function destroy($site)
    {
      $queries = \DB::table('studentpersonalSites')
       ->where('id',$site)
       ->delete();

        Session::flash('type',"warning");
        Session::flash('insert', "Sitio personal borrado.");
      
      //DELETE $site
      return $site;
    } 
}
