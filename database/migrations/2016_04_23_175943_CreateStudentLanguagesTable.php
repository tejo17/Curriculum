<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentLanguages', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del idioma del usuario');
            $table->enum('readingComprehension', ['Bajo', 'Medio', 'Alto'])->comment('Nivel de lectura');
            $table->enum('WrittedExpression', ['Bajo', 'Medio', 'Alto'])->comment('Nivel de escritura');
            $table->enum('listeningComprehension', ['Bajo', 'Medio', 'Alto'])->comment('Nivel auditivo');
            $table->enum('oralExpression', ['Bajo', 'Medio', 'Alto'])->comment('Nivel oral');
            $table->integer('language_id')->unsigned()->comment('Identificador del idioma del usuario');   
            $table->integer('student_id')->unsigned()->comment('Identificador del usuario');
            $table->foreign('language_id')->references('id')->on('languages')->onUpdate('cascade');
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
        Schema::drop('studentLanguages');
    }
}
