<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	$faker = Faker::create('es_ES');
        \DB::table('studentLanguages')->insert([
        	'readingComprehension' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
        	'WrittedExpression' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
        	'listeningComprehension' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
        	'oralExpression' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 4,
            'language_id' => 1,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('studentLanguages')->insert([
        	'readingComprehension' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
        	'WrittedExpression' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
        	'listeningComprehension' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
        	'oralExpression' => $faker->randomElement(['Alto', 'Medio', 'Bajo']),
            'student_id' => 5,
            'language_id' => 25,
            'created_at' => date('YmdHms')
        ]);
    }
}
