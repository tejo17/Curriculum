<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otherGrades', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del curso del usuario');
            $table->string('grade', 200)->comment('Curso del usuario');
            $table->string('description', 250)->comment('Breve descripcion del curso')->nullable();
            $table->string('duration', 10)->comment('Duracion del curso del usuario')->nullable();  
            $table->string('institution', 200)->comment('Insitucion donde se obtiene el curso')->nullable();  
            $table->integer('student_id')->unsigned()->comment('Identificador del estudiante'); 
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
        Schema::drop('otherGrades');
    }
}
