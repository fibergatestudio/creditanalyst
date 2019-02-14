<?php
/*
* Эта миграция создаёт таблицу источников данных
* Источники носят по сути исключительно информативный характер - предоставляют сведения о том, откуда администрация взяла данные
* К источникам относятся показатели - фактические данные
*
* Примеры:
* Источник данных 1
* Название: Абсолютно все данные с сайта Госкомстата плюс цены на бананы
* Поставщик: ООО «Аналитическое агентство “Данные Госкомстата и бананы”»
* Макс. частота: месяц
* Макс. география: область
* Список показателей:
* - Показатель 1: Объёмы производства картошки в Украине,
* - Показатель 2: ВВП Украины,
* - Показатель 3:цены на бананы
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateInfosourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infosources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru'); // Название источника на ru (в примере: Абсолютно все данные с сайта Госкомстата плюс цены на бананы); обязательное поле
            $table->string('name_en'); // Название источника на en (в примере: Абсолютно все данные с сайта Госкомстата плюс цены на бананы); обязательное поле
            $table->string('name_ua'); //Название источника на ua (в примере: Абсолютно все данные с сайта Госкомстата плюс цены на бананы); обязательное поле
            $table->string('procurer_ru')->nullable(); // Поставщик (в примере: ООО «Аналитическое агентство “Данные Госкомстата и бананы”»); необязательное поле
            $table->string('procurer_en')->nullable(); // Поставщик (в примере: ООО «Аналитическое агентство “Данные Госкомстата и бананы”»); необязательное поле
            $table->string('procurer_ua')->nullable(); // Поставщик (в примере: ООО «Аналитическое агентство “Данные Госкомстата и бананы”»); необязательное поле
            $table->string('description_ru')->nullable(); // Описание источника; необязательное поле
            $table->string('description_en')->nullable(); // Описание источника; необязательное поле
            $table->string('description_ua')->nullable(); // Описание источника; необязательное поле
            $table->string('max_frequency'); // Максимальная частота показателей в источнике (в примере: Макс. частота: месяц); обязательное поле
            $table->string('max_geographic_unit'); // Максимальный размер географических единиц, для которых представлены данные в источнике (в примере - Макс. география: область); обязательное поле
            $table->timestamps();
        });
		
		
		/*
		* Ниже представлен тестовый массив данных
		*/
		/* $data = [
			[
				'id' => 1, 
				'name_ru' => 'Абсолютно все данные с сайта Госкомстата плюс цены на бананы',
                'name_en' => 'Absolutely all the data from the State Statistics Committee website, plus banana prices',
                'name_ua' => 'Абсолютно всі дані з сайту Держкомстату плюс ціни на банани',
				'procurer' => 'ООО «Аналитическое агентство “Данные Госкомстата и бананы”»',
				'description' => 'Тестовое описание',
				'max_frequency' => 'month',
				'max_geographic_unit' => 'state'
            ],
            [
				'id' => 2, 
				'name' => 'Тестовый источник 2',
				'procurer' => 'ООО «Компания»',
				'description' => 'Тестовое описание 2',
				'max_frequency' => 'year',
				'max_geographic_unit' => 'country'
            ],
            [
                'id' => 3,
				'name' => 'Тестовый источник 3',
				'procurer' => 'ПрАТ «Акционерное общество»',
				'description' => 'Тестовое описание 3',
				'max_frequency' => 'year',
				'max_geographic_unit' => 'state'
            ]
		];
		
		DB::table('infosources')->insert($data); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infosources');
    }
}
