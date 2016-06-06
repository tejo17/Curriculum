<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfFamilieController;
use App\Http\Requests;
use App\Student;
use App\Cycle;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use View;

class StudentsController extends UsersController
{
    public $info = array();

   public function __construct(Request $request)
   {

    Parent::__construct($request);
    $this->rules += [
            // Reglas para el estudiante
    'firstName'         => 'required|between:2,45|regex:/^[A-Za-z0-9çÇàèìòùÀÈÌÒÙáéíóúÁÉÍÓÚüÜñÑ -]+$/',
    'lastName'          => 'required|between:2,75|regex:/^[A-Za-z0-9ÇàèìòùÀÈÌÒÙáéíóúÁÉÍÓÚüÜñÑ -]+$/',
    'dni'               => 'required|unique:students',
    'nre'               => 'digits:7|unique:students',
    'phone'             => 'required|digits_between:9,13',
    'address'           => 'required|between:6,225',
    'postalCode'        => 'required|digits:5',
            // El nombre es debido a datepicker
    'birthdate'         => 'required|date',
    'nationality'       => 'required|alpha|between:2,20',


            // Reglas de los ciclos. Versión anterior
    /*'family'            => 'required|exists:profFamilies,name',
    'cycles'            => 'required|exists:cycles,name',
    'yearFrom'          => 'required|digits:4|cycleYearFrom',
    'yearTo'            => 'required|digits:4',*/
    ];
    $this->rol = 'estudiante';
    $this->redirectTo = "/estudiante";
}

protected function index(){
        // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
    //$profFamilies = app(ProfFamilieController::class)->getAllProfFamilies();
    $zona = 'Registro de estudiantes';
        // Devuelvo la vista junto con las familias
    return view('student.registerForm', compact('profFamilies', 'zona'));
    } // index()

    protected function store()
    {

        // Comenzamos la transaccion.
        \DB::beginTransaction();
 
       $user = Parent::store();

        if($user === false){
            \DB::rollBack();
            Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
        } else {

            // Llamo al metodo para crear el estudiante.

            $insert = Self::create();

            if($insert !== false){

                // Llamo al metodo para almacenar sus grados.
                //$insert = self::createStudentCycle($insert);
                $insert = true;

                if ($insert === true){

                    // Llamo al metodo sendEmail del controlador de las familias profesionales
                    //$email = Parent::sendEmail();

                    //if($email === true) {
                    \DB::commit();
                    return \Redirect::to('login');
                    //} else {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
                   // }*/
                } else {
                    // Aqui debo controlar los errores de inserción de ciclos
                    \DB::rollBack();
                    Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
                }
            } else {
                \DB::rollBack();
                Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
            }
        }

        // Redireccionamos a la vista de validacion del email. (index provisional).
        return redirect()->route('estudiante..index');
    } // store()
    
    private function create()
    {//obtengo los datos
     $city_id = self::obtenerCityId();

     try {
        $arrayDatos=$this->request->all();


        $arrayDatos["postalCode"] = "";

        $arrayDatos["city_id"] = $city_id;
        


        $insert = Student::create($arrayDatos);

    } catch(\PDOException $e){
        abort(500);
    }

    if(isset($insert)){
        return $insert;
    }
    return false;
    } // create()

    // INACABADO Sin usar.Versión antigua.
   /* private function createStudentCycle($student)
    {
        $data = $this->request->all();
        $quantity = 0;
        $cycles = count($data['cycles']);

        try {
            // Para cada ciclo recibido hacemos una inserción
            foreach ($data['cycles'] as $posicion => $id) {
                $insert = null;

                $student->cycles()->attach($id, [
                    'dateTo' => $data['yearTo'][$posicion],
                    'dateFrom' => $data['yearFrom'][$posicion],
                    'student_id' => $student['id'],
                    'created_at' => date('YmdHms'),
                    ]);

                // Comprobamos si la inserción ha sido correcta
                $insert = $student->cycles()
                ->where('cycle_id', '=', $id)
                ->select(['studentCycles.id'])
                ->get()
                ->toArray();

                if(!empty($insert) && !is_null($insert)){
                    $quantity++;
                } else {
                    // Añado los errores para devolverlos sacar en la consulta el nombre del ciclo tambien para devolverlo en el error
                }
            }
        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if($quantity == $cycles){
            return true;
        }
        return false; // devuelvo false (temporal) debo devolver los errores
    } // createStudentCycle()*/

    /*Función que llama a la vista de editar el curriculum*/
    protected function editarCurriculum(){
        // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
        //$profFamilies = app(ProfFamilieControllereditarCurriculum(){::class)->getAllProfFamilies();

        /*Recuperar el id del usuario*/

       

    } // curriculum()

    /*Obtener el id de la ciudad a partir del cp*/
    public function obtenerCityId(){

        $arrayDatos = $this->request->all();
  
        $postalCode = $arrayDatos["postalCode"];

        $city_id = \DB::table('cities')->where('cities.postalCode', '=', $postalCode)->value('id');

        return $city_id;
    }
    public function getInfo(){
    // $this->info = 'paso2';
     return session()->all();
    
 }


}
