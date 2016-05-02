<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPersonalSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentPersonalSites', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del sitio personal del usuario');
            $table->string('personalSite', 30)->comment('Sitio personal del usuario')->unique();  
            $table->integer('site_id')->unsigned()->comment('Identificador del sitio personal');   
            $table->integer('student_id')->unsigned()->comment('Identificador del usuario');
            $table->foreign('site_id')->references('id')->on('personalSites')->onUpdate('cascade');
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
        Schema::drop('studentPersonalSites');
    }
}
