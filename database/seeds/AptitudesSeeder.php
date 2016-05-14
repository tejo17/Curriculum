<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AptitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	$faker = Faker::create('es_ES');
        \DB::table('aptitudes')->insert([
        	'aptitude' => $faker->text($maxNbChars = 400),
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('aptitudes')->insert([
         	'aptitude' => $faker->text($maxNbChars = 400),
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('aptitudes')->insert([
        	'aptitude' => $faker->text($maxNbChars = 400),
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('aptitudes')->insert([
         	'aptitude' => $faker->text($maxNbChars = 400),
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);
    }
}

