
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentCycles', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de los estudiantes y el ciclo que estan cursando/han cursado ');
            $table->string('center',200)->nullable()->comment('Centro en el que obtuvo el título');
            $table->string('otherFormations',255)->nullable()->comment('Campo extra por si se tiene una carrera');
            $table->string('dateTo',4)->nullable()->comment('Fecha de finalizacion del ciclo');
            $table->string('dateFrom',4)->comment('Fecha de inicio del ciclo');
            $table->integer('city_id')->unsigned()->comment('Identificador de la ciudad');
            $table->integer('student_id')->unsigned()->comment('Identificador del alumno');
            $table->integer('cycle_id')->unsigned()->nullable()->comment('Identificador del ciclo');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cycle_id')->references('id')->on('cycles')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('studentCycles');
    }
}
	