<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlackListKeywordsTableProgrammingLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programming_languages', function (Blueprint $table) {
           $table->json('black_list_keywords')->nullable()->after('function_declaration');
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
            $table->dropColumn('black_list_keywords');
        });
    }
}
