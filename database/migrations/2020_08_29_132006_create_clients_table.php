<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table){
          $table->increments('id');
          $table->string('name');
          $table->string('sex');
          $table->string('job');
          $table->string('birthday');
          $table->string('age');
          $table->string('domicile');
          $table->string('phonenumber');
          $table->string('e-mail');
          $table->string('remarks');
          $table->string('symptom');
          $table->string('course_id');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
