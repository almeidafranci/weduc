<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFunctionDeclarationTableProgrammingLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programming_languages', function (Blueprint $table) {
            $table->string('function_declaration')->after('other_functions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programming_languages', function (Blueprint $table) {
            $table->dropColumn('function_declaration');
        });
    }
}
