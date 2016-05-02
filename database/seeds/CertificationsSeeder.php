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
            'city_id' => 2,
            'state_id' => 10,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('certifications')->insert([
        	'certification' => 'C1 Inglés Cambridge',
        	'description' => '',
        	'institution' => '',
            'student_id' => 5,
            'city_id' => 4,
            'state_id' => 16,
            'created_at' => date('YmdHms')
        ]);
         $faker = Faker::create('es_ES');
        \DB::table('certifications')->insert([
        	'certification' => 'C1 Inglés Cambridge',
        	'description' => 'Título de inglés',
        	'institution' => 'Escuela Superior de idiomas',
            'student_id' => 4,
            'city_id' => 3,
            'state_id' => 18,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('certifications')->insert([
        	'certification' => 'B1 Frances',
        	'description' => '',
        	'institution' => '',
            'student_id' => 5,
            'city_id' => 6,
            'state_id' => 22,
            'created_at' => date('YmdHms')
        ]);
        
        
    }
}

