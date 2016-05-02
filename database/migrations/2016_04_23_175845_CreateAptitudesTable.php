<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAptitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aptitudes', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de los campos adicionales del usuario');
            $table->string('aptitudes', 75)->comment('Aptitudes del usuario');  
            $table->enum('level', ['Bajo', 'Medio', 'Alto'])->comment('Nivel');
            $table->integer('student_id')->unsigned()->comment('Identificador del usuario');      
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
        Schema::drop('aptitudes');
    }
}
