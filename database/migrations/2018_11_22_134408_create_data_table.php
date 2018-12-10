<?php
/*
* Эта миграция создаёт таблицу данных для приложения
* Данные = блоки, каждый из которых состоит из даты+географического положения+значения
* Географическое местоположение задаётся по справочнику КОАТУУ как ID
* Дата = начальная дата, с которой считается период, к которому относятся данные (так, если речь идёт о 1-ом квартале 2018 года, то дата в таблице будет 01.01.2018)
*
* Примеры:
*
* Показатель:
* Название: Объёмы производства картошки в Украине
* Частота: год
* География: область
* Единица измерения: тонны
*
* Данные для данного показателя:
* Дата                              География                           Значение
* 2017-01-01 (т.е. 2017-й год)	    6300000000(Харьковская область)	    800
* 2017-01-01	                    5300000000(Полтавская область)	    980
* …	                                … (остальные области)	            …
* 2016-01-01 (2016-й год)	        6300000000	                        876
* 2016-01-01	                    5300000000                          789
* 2016-01-01	                    … (остальные области)	            …
*
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date'); // Дата, с которой начинается период, к которому относится значение. Период берётся по Показателю ("родительскому" элементу)
            $table->string('geography'); // Код КОАТУУ, который обозначает територальную единицу, к которой относятся данные
            $table->float('value', 14, 6); // Числовое значение блока
            $table->unsignedInteger('indicator_id'); // ID Показателя, к которому относятся данные
            $table->foreign('indicator_id')->references('id')->on('indicators'); // Foregin key для ID показателя, к которому относятся данные
            $table->timestamps();
        });
		
		/*
		* Ниже представлен тестовый массив данных
		*/
		
		/* $data = [
			[
				'id' => 1,
				'date' => '2017-01-01',
				'geography' => '6300000000',
				'value' => '800.00',
				'indicator_id' => 1				
			],
			[
				'id' => 2,
				'date' => '2017-01-01',
				'geography' => '5300000000',
				'value' => '980.00',
				'indicator_id' => 1		
			]
		];
		
		DB::table('data')->insert($data); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
