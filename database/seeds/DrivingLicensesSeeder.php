<?php

use Illuminate\Database\Seeder;

class DrivingLicensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     

        \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'AM',
            'created_at' => date('YmdHms')
        ]);

         \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'A1',
            'created_at' => date('YmdHms')
        ]);

          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'A2',
            'created_at' => date('YmdHms')
        ]);
       	
       	   \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'A',
            'created_at' => date('YmdHms')
        ]);

        \DB::table('drivingLicenses')->insert([
          'drivingLicense' => 'B1',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'B',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'BE',
            'created_at' => date('YmdHms')
        ]);

         \DB::table('drivingLicenses')->insert([
          'drivingLicense' => 'BTP',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'C1',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'C',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'C1E',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'CE',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'D1',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'D',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'D1E',
            'created_at' => date('YmdHms')
        ]);
       
          \DB::table('drivingLicenses')->insert([
        	'drivingLicense' => 'DE',
            'created_at' => date('YmdHms')
        ]);
       
         
       
       
    }
}

