<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyNotificationsWaitingListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_notifications_waiting_list', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('dataset_entry_id');
            $table->unsignedInteger('user_id');
            $table->boolean('seen')->default(true);
            $table->foreign('dataset_entry_id')->references('id')->on('data');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('daily_notifications_waiting_list');
    }
}
