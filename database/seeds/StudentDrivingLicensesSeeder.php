<?php

use Illuminate\Database\Seeder;

class StudentDrivingLicensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
    	
        \DB::table('StudentDrivingLicenses')->insert([
            'student_id' => 4,
            'license_id' => 1,
            'created_at' => date('YmdHms')
        ]);
         \DB::table('StudentDrivingLicenses')->insert([
            'student_id' => 4,
            'license_id' => 5,
            'created_at' => date('YmdHms')
        ]);
          \DB::table('StudentDrivingLicenses')->insert([
            'student_id' => 5,
            'license_id' => 2,
            'created_at' => date('YmdHms')
        ]);
           \DB::table('StudentDrivingLicenses')->insert([
            'student_id' => 5,
            'license_id' => 9,
            'created_at' => date('YmdHms')
        ]);
    }
}

