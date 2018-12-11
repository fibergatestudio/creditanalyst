<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateFrequencyUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequency_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name_en');
            $table->string('name_ua');
			$table->string('name_ru');
            $table->timestamps();
        });
		
		/* $data = [
			['id' => 1, 'slug' => 'month', 'name_ru' => 'месяц'],
			['id' => 2, 'slug' => 'year', 'name_ru' => 'год']
		];
			
		
		DB::table('frequency_units')->insert($data); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequency_units');
    }
}
