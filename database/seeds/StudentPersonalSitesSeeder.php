<?php

use Illuminate\Database\Seeder;

class StudentPersonalSitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	
        \DB::table('StudentPersonalSites')->insert([
        	'personalSite' => 'nando@gmail.com',
            'student_id' => 4,
            'site_id' => 1,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('StudentPersonalSites')->insert([
         	'personalSite' => 'nando@hotmail.com',
            'student_id' => 4,
            'site_id' => 4,
            'created_at' => date('YmdHms')
        ]);
          \DB::table('StudentPersonalSites')->insert([
          	'personalSite' => 'abel@gmail.com',
            'student_id' => 5,
            'site_id' => 1,
            'created_at' => date('YmdHms')
        ]);
           \DB::table('StudentPersonalSites')->insert([
           	'personalSite' => 'abel@hotmail.com',
            'student_id' => 5,
            'site_id' => 4,
            'created_at' => date('YmdHms')
        ]);
    }
}


