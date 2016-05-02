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
            $table->integer('license_id')->unsigned()->comment('Identificador del carnet de conducir del usuario');   
            $table->integer('student_id')->unsigned()->comment('Identificador del usuario');
            $table->foreign('license_id')->references('id')->on('drivingLicenses')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
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

