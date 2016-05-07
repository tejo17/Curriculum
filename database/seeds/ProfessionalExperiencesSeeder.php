<?php

use Illuminate\Database\Seeder;


class ProfessionalExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     

        \DB::table('professionalExperiences')->insert([
        	'enterprise' => 'Informática del Este',
        	'description' => 'Reparación de equipos y mantenimiento de redes en empresas, servicio técnico en general.',
        	'job' => 'Informático de sistemas.',
        	'from' => '2013-09-09',
        	'to'=> '2015-06-09',
            'city_id' => 52,
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);
        
        \DB::table('professionalExperiences')->insert([
        	'enterprise' => 'Informática del Sur',
        	'description' => 'Reparación de equipos y mantenimiento de redes en empresas, servicio técnico en general.',
        	'job' => 'Informático de sistemas.',
        	'from' => '2012-09-09',
        	'to'=> '2014-06-09',
            'city_id' => 44,
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);
    }
}
