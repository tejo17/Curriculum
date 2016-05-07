<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CertificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	$faker = Faker::create('es_ES');
        \DB::table('certifications')->insert([
        	'certification' => 'B1 Inglés Cambridge',
        	'description' => 'Título de inglés',
        	'institution' => 'Escuela Superior de idiomas',
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('certifications')->insert([
        	'certification' => 'C1 Inglés Cambridge',
        	'description' => 'Título de inglés',
        	'institution' => 'Escuela Superior de idiomas',
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);
         $faker = Faker::create('es_ES');
        \DB::table('certifications')->insert([
        	'certification' => 'C1 Inglés Cambridge',
        	'description' => 'Título de inglés',
        	'institution' => 'Escuela Superior de idiomas',
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('certifications')->insert([
        	'certification' => 'B1 Frances',
        	'description' => 'Título de francés',
        	'institution' => 'Escuela Superior de idiomas',
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);
        
        
    }
}

