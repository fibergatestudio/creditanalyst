<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateKoatuuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koatuu', function (Blueprint $table) {
            $table->increments('id');
			$table->string('unique_koatuu_id');
			$table->string('name_ru');
            $table->timestamps();
        });
		
		/*
		* Ниже представлен тестовый массив данных
		*/
		
		$data = [
			[
				'id' => 1,
				'unique_koatuu_id' => 6300000000,
				'name_ru' => 'Харьковская область'
			],
			[
				'id' => 2,
				'unique_koatuu_id' => 5300000000,
				'name_ru' => 'Полтавская область'
			]
		];
		
		DB::table('koatuu')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koatuu');
    }
}
