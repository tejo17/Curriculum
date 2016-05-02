<?php

use Illuminate\Database\Seeder;

class PersonalSitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	
        \DB::table('personalSites')->insert([
        	'site' => 'Hangouts',
            'created_at' => date('YmdHms')
        ]);
        \DB::table('personalSites')->insert([
        	'site' => 'Skype',
            'created_at' => date('YmdHms')
        ]);
        \DB::table('personalSites')->insert([
        	'site' => 'ICQ',
            'created_at' => date('YmdHms')
        ]);
        \DB::table('personalSites')->insert([
        	'site' => 'MSN',
            'created_at' => date('YmdHms')
        ]);
        \DB::table('personalSites')->insert([
        	'site' => 'Linkedin',
            'created_at' => date('YmdHms')
        ]);
    }
}
