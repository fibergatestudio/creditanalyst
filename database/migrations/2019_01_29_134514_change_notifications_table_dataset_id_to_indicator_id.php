<?php
/*
* Миграцию создал Якименко при работе над логикой создания уведомлений о заходе новых данных в базу
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNotificationsTableDatasetIdToIndicatorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Очищаем таблицу от данных
        DB::table('notifications')
            ->where('id', '>', 0)
            ->delete();
        
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['dataset_entry_id']); // Убираем foreign индекс
            $table->dropColumn('dataset_entry_id'); // Дропаем старую колонку
            $table->unsignedInteger('indicator_id');
            $table->foreign('indicator_id')->references('id')->on('indicators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            
            /* Дропаем новый форейн индекс и колонку */
            $table->dropForeign(['indicator_id']);
            $table->dropColumn('indicator_id');

            /* Возвращаем колонку dataset_entry_id с foreign индексом */
            $table->unsignedInteger('dataset_entry_id');
            $table->foreign('dataset_entry_id')->references('id')->on('data');
        });
    }
}
