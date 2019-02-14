<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFulltextIndexToIndicators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::table('indicators', function (Blueprint $table) {
            //
        //});
        DB::statement('ALTER TABLE indicators ADD FULLTEXT fulltext_index_ru (name_ru)');

        DB::statement('ALTER TABLE indicators ADD FULLTEXT fulltext_index_en (name_en)');

        DB::statement('ALTER TABLE indicators ADD FULLTEXT fulltext_index_ua (name_ua)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::table('indicators', function (Blueprint $table) {
            //
        //});

        DB::statement('ALTER TABLE indicators DROP INDEX fulltext_index');
    }
}
