<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDrivingLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentDrivingLicenses', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del carnet de conducir del usuario');
            $table->string('drivingLicense', 50)->comment('Licencia de conducir');  
            $table->integer('student_id')->unsigned()->comment('Identificador del usuario')->unique();            
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
        Schema::drop('studentDrivingLicenses');
    }
}

