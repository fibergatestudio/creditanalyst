<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserIndicatorWatchList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_indicator_watch_list', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->dropForeign('user_indicator_watch_list_user_id_foreign');
            $table->dropForeign('user_indicator_watch_list_indicator_id_foreign');
            $table->string('alias', 100)->default('');
            $table->unsignedSmallInteger('position')->default(0);
            $table->boolean('notify')->default(false);
            $table->json('notify_info')->default('{}');
            $table->unique(['user_id', 'indicator_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
