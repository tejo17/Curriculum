<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la certificacion del usuario');
            $table->string('certification', 200)->comment('Nombre de la certificacion obtenida por el usuario');
            $table->string('description', 250)->comment('Breve descripcion de la certificacion')->nullable(); 
            $table->string('institution', 200)->comment('Institucion en la que obtiene la certificacion el usuario');     
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
        Schema::drop('certifications');
    }
}

