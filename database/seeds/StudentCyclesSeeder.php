<?php

use Illuminate\Database\Seeder;

class StudentCyclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        

        /******************************************
    				FERNANDO STUDENT
    	*******************************************/

    	\DB::table('studentCycles')->insert([
    		'center' => 'I.E.S. Ingeniero de la Cierva',
            'carreer' => ''
            'dateFrom' => '2014',
            'dateTo' => null,
            'city_id' => 40634,
            'student_id' => 4,
            'cycle_id' => 7,
            'created_at' => date('YmdHms')
        ]);

		\DB::table('studentCycles')->insert([
    		'center' => 'Universidad de Espinardo',
            'carreer' => 'Ingeniería Afeitando Bombillas'            
            'dateFrom' => '2010',
            'dateTo' => '2015',
            'city_id' => 40634,
            'student_id' => 4,
            'cycle_id' => null,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				ABEL STUDENT
    	*******************************************/

    	\DB::table('studentCycles')->insert([
    		'center' => 'I.E.S. Ingeniero de la Cierva',
            'carreer' => ''            
            'dateFrom' => '2014',
            'dateTo' => null,
            'city_id' => 40634,
            'student_id' => 5,
            'cycle_id' => 6,
            'created_at' => date('YmdHms')
        ]);

		\DB::table('studentCycles')->insert([
    		'center' => 'Universidad de Murcia',
            'carreer' => 'Ingeniero Agrónomo'            
            'dateFrom' => '2010',
            'dateTo' => '2015',
            'city_id' => 40634,
            'student_id' => 5,
            'cycle_id' => null,
            'created_at' => date('YmdHms')
        ]);

    }
}
