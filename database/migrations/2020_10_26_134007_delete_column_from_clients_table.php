<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnFromClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
          $table->dropColumn(['domicile']);
          $table->dropColumn(['phonenumber']);
          $table->dropColumn(['e-mail']);
          $table->dropColumn(['remarks']);
          $table->dropColumn(['symptom']);
          $table->dropColumn(['course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
          $table->string('domicile');
          $table->string('phonenumber');
          $table->string('e-mail');
          $table->string('remarks');
          $table->string('symptom');
          $table->string('course_id');
        });
    }
}
