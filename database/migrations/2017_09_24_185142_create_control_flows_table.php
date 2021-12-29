<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_flows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('programming_language_id')->unsigned();
            $table->foreign('programming_language_id')
                ->references('id')->on('programming_languages')
                ->onDelete('cascade');
            $table->string('break_code')->nullable();
            $table->string('do_code')->nullable();
            $table->string('for_code')->nullable();
            $table->string('if_code')->nullable();
            $table->string('else_if')->nullable();
            $table->string('else')->nullable();
            $table->string('repeat_code')->nullable();
            $table->string('switch_code')->nullable();
            $table->string('case')->nullable();
            $table->string('while_code')->nullable();
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
        Schema::dropIfExists('control_flows');
    }
}
