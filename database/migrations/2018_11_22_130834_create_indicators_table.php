<?php
/*
* Эта миграция создаёт таблицу Показателей
* Показатель - это категория данных.
* Примеры: Объёмы производства картошки в Украине, ВВП Украины, Цены на бананы
* Показатель относится к определённому источнику
*
* Примеры:
* Показатель 1
* Название: Объёмы производства картошки в Украине
* Частота: год
* География: область
* Единица измерения: тонны
*
* Показатель 2
* Название: ВВП Украины
* Частота: квартал
* География: Украина
* Единица измерения: млрд. грн.
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // Название показателя, обязательное поле
            $table->string('frequency'); // Частота показателя - за какой период предоставляется блок данных (месяц, квартал, год, возможно - другие варианты)
            $table->string('geography_unit'); // Географическая единица - территориальная величина, на которую предоставляется один блок данных (район, область, регион, возможны другие варианты)
            $table->string('measurement_unit'); // Единица измерения показателя (кг, тонна, гривны и т.д.)
            $table->unsignedInteger('source_id'); // Источник, к которому относится показатель
            $table->foreign('source_id')->references('id')->on('infosources'); // Foreign key для источника, к которому относится показатель
            $table->timestamps();
        });
		
		
		/*
		* Ниже представлен тестовый массив данных
		*/
		
		/* $data = [
			[
				'id' => 1,
				'name' => 'Объёмы производства картошки в Украине',
				'frequency' => 'month',
				'geography_unit' => 'state',
				'measurement_unit' => 'tonns',
				'source_id' => 1
            ],
            [
				'id' => 2,
				'name' => 'Объёмы производства бананов в Украине',
				'frequency' => 'month',
				'geography_unit' => 'state',
				'measurement_unit' => 'tonns',
				'source_id' => 1
			]
		];
		
		DB::table('indicators')->insert($data); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicators');
    }
}
