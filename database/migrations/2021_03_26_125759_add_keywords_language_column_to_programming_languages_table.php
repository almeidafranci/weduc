<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeywordsLanguageColumnToProgrammingLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programming_languages', function (Blueprint $table) {
            $table->char('keywords_language',7)
                ->after('user_id')
                ->default('pt_BR');
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
            $table->dropColumn('keywords_language');
        });
    }
}
