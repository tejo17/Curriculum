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
            'drivingLicense' => ('A,A1,B'),
            'created_at' => date('YmdHms')
        ]);

          \DB::table('StudentDrivingLicenses')->insert([
            'student_id' => 5,
            'drivingLicense' => ('BTP,C,B1'),
            'created_at' => date('YmdHms')
        ]);

    }
}

