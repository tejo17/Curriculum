<?php

use Illuminate\Database\Seeder;
// Incluimos la librería faker
use Faker\Factory as Faker;

class OurUsersSeeder extends Seeder
{
    /**
     * Método que genera un código para las promociones
     * Por medidas de seguridad se admite que tengan "-"" y "_"
     * De forma que no sea simplemente alfanumerico
     * @return [type] [description]
     */
    public static function generarCodigo(){
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890" . date("Yhis");
        $cad = "";
        //                                        AÑO   HORA MIN  SEG
        // Montamos una cadena aleatoria con 63 + 0000 + 00 + 00 + 00
        // Total de caracteres 25 - aleatorios + el string bolsaempleo
        for($i=0;$i<15;$i++) {
            $cad .= mb_substr($str,rand(0,73),1) . date("Yhis") . "bolsaempleo";
        }
        return $cad;
    } // generarCodigo()

    /**
     * Este seeder incluye...
     * Seis usuarios de cada rol (admin, teacher, student y enterprise) completamente dados de alta.
     * Tres usuarios de cada rol sin haber sido confirmados como personas reales por sus respectivos.
     * Tres usuarios de cada rol sin verificar su email y sin haber sido confirmados como personas reales.
     * @return void
     */
    public function run()
    {
        // Creamos una instancia de Faker
        $faker = Faker::create('es_ES');

    	$user_ids = [];
    	$cont_user = 0;
        $code_generated = [];
        $registros = 50;

        // 50 redistros de usuarios
        for($i = 0; $i < $registros ;$i++){
            // Generamos un código aleatorio
            // y lo convertimos con MD5
            $code_generated[] = md5(OurUsersSeeder::generarCodigo());
        }

    	// Datos de usuarios.
    	$pass = 'Password1';
    	$code = 'CODIGO_prueba123';
    	$verifiedEmail = true;
    	$active = true;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<------INSERCION DE USUARIOS ADMINISTRADORES----->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

    	$rol = 'administrador';

        // Inserción del usuario Admin1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('eduardo@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('emmanuel@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('pedro@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<--------INSERCION DE USUARIOS PROFESORES-------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

        $rol = 'profesor';

        // Inserción del usuario Teacher1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('profesor1@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('profesor2@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('profesor3@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<---INSERCION DE PROFESORES ROL ADMINISTRADOR--->>>>>>
 */
		$teacher_ids = [];
		$cont_teacher = 0;

        // Inserción de Admin1 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Eduardo Admin'),
        	'lastName' => mb_strtolower('López Pardo'),
        	'dni' => mb_strtoupper('26834560T'),
        	'phone' => '666666661',
        	'user_id' => $user_ids[0],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin2 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Emmanuel Admin'),
        	'lastName' => mb_strtolower('Valverde Ramos'),
        	'dni' => mb_strtoupper('80946137Y'),
        	'phone' => '666666662',
        	'user_id' => $user_ids[1],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin3 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Pedro Admin'),
        	'lastName' => mb_strtolower('Hernández-Mora de Fuentes'),
        	'dni' => mb_strtoupper('60735733R'),
        	'phone' => '666666663',
        	'user_id' => $user_ids[2],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin4 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Fernando Admin'),
        	'lastName' => mb_strtolower('Barcelona Pérez'),
        	'dni' => mb_strtoupper('94776325H'),
        	'phone' => '666666664',
        	'user_id' => $user_ids[3],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin5 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Abel Admin'),
        	'lastName' => mb_strtolower('Montejo Rodríguez'),
        	'dni' => mb_strtoupper('88779523Y'),
        	'phone' => '666666665',
        	'user_id' => $user_ids[4],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin6 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Carlos Admin'),
        	'lastName' => mb_strtolower('Abrisqueta'),
        	'dni' => mb_strtoupper('27015870R'),
        	'phone' => '666666666',
        	'user_id' => $user_ids[5],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

/*
 * <<<<<<------INSERCION DE PROFESORES ROL PROFESOR----->>>>>>
 */

        // Inserción de Teacher1 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Eduardo Teacher'),
        	'lastName' => mb_strtolower('López Pardo'),
        	'dni' => mb_strtoupper('64283714W'),
        	'phone' => '666666667',
        	'user_id' => $user_ids[6],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher2 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Emmanuel Teacher'),
        	'lastName' => mb_strtolower('Valverde Ramos'),
        	'dni' => mb_strtoupper('84241523K'),
        	'phone' => '666666668',
        	'user_id' => $user_ids[7],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher3 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Pedro Teacher'),
        	'lastName' => mb_strtolower('Hernández-Mora de Fuentes'),
        	'dni' => mb_strtoupper('53943588D'),
        	'phone' => '666666669',
        	'user_id' => $user_ids[8],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher4 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Fernando Teacher'),
        	'lastName' => mb_strtolower('Barcelona Pérez'),
        	'dni' => mb_strtoupper('38017641K'),
        	'phone' => '666666670',
        	'user_id' => $user_ids[9],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher5 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Abel Teacher'),
        	'lastName' => mb_strtolower('Montejo Rodríguez'),
        	'dni' => mb_strtoupper('92215623K'),
        	'phone' => '666666671',
        	'user_id' => $user_ids[10],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher6 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Carlos Teacher'),
        	'lastName' => mb_strtolower('Abrisqueta'),
        	'dni' => mb_strtoupper('73682145N'),
        	'phone' => '666666672',
        	'user_id' => $user_ids[11],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<--------INSERCION DE USUARIOS ESTUDIANTE-------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

        $rol = 'estudiante';

        // Inserción del usuario Student1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('alumno1@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('alumno2@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('alumno3@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<-----INSERCION DE ESTUDIANTES ROL ESTUDIANTE---->>>>>>
 */
		$student_ids = [];
		$cont_student = 0;

        // Inserción de Student1 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Edu Student'),
        	'lastName' => mb_strtolower('López Pardo'),
        	'dni' => mb_strtoupper('13195649C'),
        	'nre' => '1234567',
        	'phone' => '666666673',
        	'address' => 'Rio Ring, 3',
        	'curriculum' => '/storage/app/curriculums/eduardo-' . date('d-m-Y') . '/curriculum1-' . date('dmY') . '.pdf',
        	'birthdate' => '1995-11-09',
            'nationality' => 'español',
        	'user_id' => $user_ids[12],
            'city_id' => 12,
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms'),
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student2 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Emmanuel Student'),
        	'lastName' => mb_strtolower('Valverde Ramos'),
        	'dni' => mb_strtoupper('74053121K'),
        	'nre' => '2345678',
        	'phone' => '666666674',
        	'address' => 'Santa Maria, 1 1ºC Escalera sur',
        	'curriculum' => '/storage/app/curriculums/emmanuel-' . date('d-m-Y') . '/curriculum21-' . date('dmY') . '.pdf',
        	'birthdate' => '1992-06-09',
            'nationality' => 'español',
            'user_id' => $user_ids[13],
            'city_id' => 13,
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student3 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Pedro Student'),
        	'lastName' => mb_strtolower('Hernández-Mora de Fuentes'),
        	'dni' => mb_strtoupper('85381923N'),
        	'nre' => '3456789',
        	'phone' => '666666675',
        	'address' => 'Constitucion, 4 4ºA escalera norte',
        	'curriculum' => '/storage/app/curriculums/pedro-' . date('d-m-Y') . '/curriculum31-' . date('dmY') . '.pdf',
        	'birthdate' => '1992-04-17',
            'nationality' => 'español',
        	'user_id' => $user_ids[14],
            'city_id' => 14,
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student4 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Fernando Student'),
        	'lastName' => mb_strtolower('Barcelona Pérez'),
        	'dni' => mb_strtoupper('04084612L'),
        	'nre' => '4567890',
        	'phone' => '666666676',
        	'address' => 'Girona, 3 4ºC',
        	'curriculum' => '/storage/app/curriculums/fernando-' . date('d-m-Y') . '/curriculum41-' . date('dmY') . '.pdf',
        	'birthdate' => '1987-08-20',
            'nationality' => 'español',
        	'user_id' => $user_ids[15],
            'city_id' => 129,
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student5 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Abel Student'),
        	'lastName' => mb_strtolower('Montejo Rodríguez'),
        	'dni' => mb_strtoupper('05493598W'),
        	'nre' => '5678901',
        	'phone' => '666666677',
        	'address' => 'Rio Pisuerga, 8 1ºB',
        	'curriculum' => '/storage/app/curriculums/abel-' . date('d-m-Y') . '/curriculum5-' . date('dmY') . '.pdf',
        	'birthdate' => '1984-11-17',
            'nationality' => 'rumano',
        	'user_id' => $user_ids[16],
            'city_id' => 122,
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student6 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Carlos Student'),
        	'lastName' => mb_strtolower('Abrisqueta'),
        	'dni' => mb_strtoupper('15915280Q'),
        	'nre' => '6789012',
        	'phone' => '666666678',
        	'address' => 'Marques de rozalejo, 9',
        	'curriculum' => '/storage/app/curriculums/carlos-' . date('d-m-Y') . '/curriculum6-' . date('dmY') . '.pdf',
        	'birthdate' => '1990-01-06',
            'nationality' => 'español',
        	'user_id' => $user_ids[17],
            'city_id' => 121,
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<----------INSERCION DE USUARIOS EMPRESA--------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

        $rol = 'empresa';

        // Inserción del usuario Enterprise1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('empresa1@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('empresa2@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('empresa3@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<--------INSERCION DE EMPRESAS ROL EMPRESA-------->>>>>>
 */
		$enterprise_ids = [];
		$cont_enterprise = 0;

        // Inserción de Enterprise1 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La taberna de Eduardo'),
        	'cif' => mb_strtoupper('N9210188J'),
        	'web' => 'https://www.latabernadeeduardo.es/',
        	'description' => 'La mejor taberna si no tenemos en cuenta a las demás.',
        	'user_id' => $user_ids[18],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise2 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('El mesón de Emmanuel'),
        	'cif' => mb_strtoupper('P8426294H'),
        	'web' => 'http://www.elmesondemanu.es/',
        	'description' => 'Ven corriendo o ven andando, pero ven.',
           	'user_id' => $user_ids[19],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise3 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La optica de Pedro'),
        	'cif' => mb_strtoupper('V9683948E'),
        	'web' => 'https://www.laopticadepedro.es/',
        	'description' => 'No vendemos gafas graduadas, sólo gafas de postureo.',
        	'user_id' => $user_ids[20],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise4 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La ferretería de Fernando'),
        	'cif' => mb_strtoupper('P9516378H'),
        	'web' => 'https://www.ferferreteros.com/',
        	'description' => 'Nunca me sobran tuercas ni se me cae un solo tornillo.',
        	'user_id' => $user_ids[21],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise5 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('El hotel de Abel'),
        	'cif' => mb_strtoupper('Q9693683F'),
        	'web' => 'https://www.elhoteldeabel.es/',
        	'description' => 'Hoteles de lujo a precio de pensión, vendrás solo por diversión.',
        	'user_id' => $user_ids[22],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise6 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La floristería de Carlos'),
        	'cif' => mb_strtoupper('U5279210H'),
        	'web' => 'https://www.laflordecarlos.es/',
        	'description' => 'Vendemos flores de todos los colores.',
        	'user_id' => $user_ids[23],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

    }
}