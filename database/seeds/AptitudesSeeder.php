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
        	'aptitudes' => 'Java',
        	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('aptitudes')->insert([
         	'aptitudes' => 'PHP',
         	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('aptitudes')->insert([
        	'aptitudes' => 'JavaScript',
        	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('aptitudes')->insert([
         	'aptitudes' => 'SQL',
         	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('aptitudes')->insert([
        	'aptitudes' => 'Python',
        	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('aptitudes')->insert([
         	'aptitudes' => '.NET',
         	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('aptitudes')->insert([
        	'aptitudes' => 'JQuery',
        	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('aptitudes')->insert([
         	'aptitudes' => 'NodeJS',
         	'level' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);
    }
}

