<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del estudiante');
            $table->string('firstName', 50)->comment('Nombre del estudiante');
            $table->string('lastName', 75)->comment('Apellidos del estudiante');
            $table->string('dni', 9)->comment('DNI/NIE del estudiante')->unique();
            $table->string('nre', 10)->comment('NRE del estudiante')->unique()->nullable();
            $table->string('phone', 12)->comment('Telefono del estudiante');
            $table->string('address', 255)->comment('Direccion del estudiante');
            $table->string('curriculum', 255)->comment('Ruta del curriculum del estudiante');
            $table->date('birthdate','Y-m-d')->comment('Fecha de nacimiento del estudiante');
            $table->string('nationality', 20)->comment('Nacionalidad del estudiante, por si el curriculum es para estudiar en el extranjero');
            $table->integer('user_id')->comment('Identificador de los datos de usuario del estudiante')->unsigned();
            $table->integer('city_id')->comment('Identificador de la ciudad del estudiante')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
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
        Schema::drop('students');
    }
}
