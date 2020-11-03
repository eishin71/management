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
          $table->datetime('birthday');
          $table->string('job')->nullable();
          $table->string('domicile')->nullable();
          $table->string('phonenumber')->nullable();
          $table->string('e-mail')->nullable();
          $table->string('remarks')->nullable();
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
