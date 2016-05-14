<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OtherGradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	
        \DB::table('otherGrades')->insert([
        	'grade' => 'Curso de repostería',
        	'description' => 'Tartas de la abuela y tartas de queso',
        	'duration' => '40 horas',
        	'institution' => 'Escuela de repostería de mi casa',
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('otherGrades')->insert([
        	'grade' => 'Curso de higiene bucodental',
        	'description' => '',
        	'duration' => '40 horas',
        	'institution' => 'Escuela de repostería de mi casa',
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
          \DB::table('otherGrades')->insert([
        	'grade' => 'Curso de pelador de mariscos con caparazón',
        	'description' => 'pelador profesional de gambas y langostinos',
        	'duration' => '40 horas',
        	'institution' => 'Escuela de repostería de mi casa',
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);
           \DB::table('otherGrades')->insert([
        	'grade' => 'Curso de buzo',
        	'description' => 'Inmersiones a más de 4000 metros de profundidad',
        	'duration' => '400 horas',
        	'institution' => 'Escuela de repostería de mi casa',
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);
     
    }
}

