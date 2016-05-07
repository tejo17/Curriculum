<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionalExperiences', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del oficio del usuario');
            $table->string('enterprise', 200)->comment('Empresa en la que trabaja o ha trabajado el usuario');
            $table->text('description')->comment('Descripcion del oficio realizado')->nullable(); 
            $table->string('job', 100)->comment('Nombre del empleo'); 
            $table->date('from', 'Ymd')->comment('Fecha de inicio del empleo');
            $table->date('to', 'Ymd')->comment('Fecha fin del empleo')->nullable();
            $table->integer('city_id')->unsigned()->comment('Identificador de la ciudad en la que obtuvo el curso el usuario'); 
            $table->integer('state_id')->unsigned()->comment('Identificador de la provincia en la que obtuvo el curso el usuarioo');  
            $table->integer('student_id')->unsigned()->comment('Identificador del usuario');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade'); 
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
        Schema::drop('professionalExperiences');
    }
}
