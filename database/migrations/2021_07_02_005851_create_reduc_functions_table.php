<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReducFunctionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reduc_functions', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('programming_language_id')->unsigned();
      $table->foreign('programming_language_id')
        ->references('id')->on('programming_languages')
        ->onDelete('cascade');
      $table->string('name');
      $table->string('description');
      $table->json('category');
      $table->string('return_type');
      $table->string('return_description');
      $table->text('reduc_code');
      $table->text('code');
      $table->tinyInteger('parameters')->unsigned();
      $table->json('parameters_list');
      $table->json('example_list');
      $table->integer('state')->unsigned();
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
    Schema::dropIfExists('reduc_functions');
  }
}
