<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {

              $table->increments('id', 10)->comment('Identificador del sitio idioma');
              $table->string('language', 49)->nullable()->default(NULL)->comment('Idioma'); 
              $table->string('iso_639-1', 2)->nullable()->default(NULL);
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
        Schema::drop('languages');
    }
}

