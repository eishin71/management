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
          $table->bigincrements('id');
          $table->string('name');
          $table->string('sex');
          $table->string('job');
          $table->datetime('birthday');
          $table->string('age');
          $table->string('domicile');
          $table->string('phonenumber');
          $table->string('e-mail');
          $table->string('remarks');
          $table->string('symptom');
          $table->integer('course_id');
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
