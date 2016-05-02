<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrivingLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivingLicenses', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de cada licencia de conducir');
            $table->string('drivingLicense', 3)->comment('Licencia de conducir')->unique();  
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drivingLicenses');
    }
}