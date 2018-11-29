<?php
/*
* Эта миграция создаёт таблицу данных, которые будет использовать в своей работе крон скрипт, отвечающий за оповещения
* Данные last_processed_indicator_id - это ID послдней строки в таблице идентификаторов, которая была отработана при последнем проходжении скрипта
* По умолчанию это 0 - скрипт проходит таблицу с начала. После прохождения сюда заносится ID последней строки в таблице
* Таким образом, все данные, которые попали в таблицу ПОСЛЕ отработки скрипта, будут обработаны на следующей итерации
* 
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cron_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });

        DB::table('cron_data')->insert(
            array(
                'key' => 'last_processed_indicator_id',
                'value' => 0
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cron_data');
    }
}
