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
      private $datospersonales = array();
    public function __construct(Request $request)
    {
        

        Parent::__construct($request);
        $this->rules += [
            // Reglas para el estudiante
            'firstName'          => 'required|between:2,45|regex:/^[A-Za-z0-9 ]+$/',
            'lastName'          => 'required|between:2,75|regex:/^[A-Za-z0-9 ]+$/',
            'dni'               => 'required',
            'nre'               => 'digits:7',
            'phone'             => 'required|digits_between:9,13',
            'address'           => 'required|between:6,225',
            'codPostal'         => 'digits:5',
            // El nombre es debido a datepicker
            'birthdate_submit'  => 'required|date',
            'nationality'       => '',

            // Reglas de los ciclos.
            'family'            => 'required|exists:profFamilies,name',
            'cycles'            => 'required|exists:cycles,name',
            'yearFrom'          => 'required|digits:4|cycleYearFrom',
            'yearTo'            => 'required|digits:4',
        ];
        $this->rol = 'estudiante';
        $this->redirectTo = "/estudiante";
    }

    protected function index(){
        // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
        $profFamilies = app(ProfFamilieController::class)->getAllProfFamilies();
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
           
            $arrayDatos["city_id"] = "$city_id";
            var_dump($arrayDatos);

            $insert = Student::create($arrayDatos);
            
        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insert)){
            return $insert;
        }
        return false;
    } // create()

    // INACABADO
    private function createStudentCycle($student)
    {
        $data = $this->request->all();
        $cuantity = 0;
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
                    $cuantity++;
                } else {
                    // Añado los errores para devolverlos sacar en la consulta el nombre del ciclo tambien para devolverlo en el error
                }
            }
        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if($cuantity == $cycles){
            return true;
        }
        return false; // devuelvo false (temporal) debo devolver los errores
    } // createStudentCycle()

    protected function imagenPerfil(){
        // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
        $profFamilies = app(ProfFamilieController::class)->getAllProfFamilies();
        $user = Auth::user()->id;
        $datos = \DB::table('students')
                                ->join('cities','students.city_id', '=' ,'cities.id')
                                ->join('states','states.id', '=' ,'cities.state_id')
                                ->select('firstName','lastName','dni','nre','phone','address','curriculum','birthdate','nationality','states.name as state','cities.name as city','postalCode')
                                ->where('user_id', $user)
                                ->get();

       $datospersonales+=['firstName' => $datos[0]->firstName,
                'lastName' => $datos[0]->lastName,
                'dni' => $datos[0]->dni,
                'nre' => $datos[0]->nre,
                'phone' => $datos[0]->phone,
                'address' => $datos[0]->address,
                'curriculum' => $datos[0]->curriculum,
                'birthdate' => $datos[0]->birthdate,
                'nationality' => $datos[0]->nationality,
                'state' => $datos[0]->state,
                'lastName' => $datos[0]->lastName,
                'city' => $datos[0]->city,
                'postalCode' => $datos[0]->postalCode,

        ];
       
       $datosjson = json_encode($datospersonales);

       
        // Devuelvo la vista junto con las familias
        return View::make('student.profile')->with('datospersonales',$datosjson);
        //return $json;
    } // profile()

      public function obtenerCityId(){
    $arrayDatos = $this->request->all();
   // var_dump($arrayDatos);
    $postalCode = $arrayDatos["postalCode"];
    //var_dump($postalCode);
    $city_id = \DB::table('cities')->where('cities.postalCode', '=', $postalCode)->value('id');

    return $city_id;
    }
    public function getInfo(){
       return $this->$datospersonales;
    }
}
