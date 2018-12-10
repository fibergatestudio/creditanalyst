<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateMeasurementUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurement_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name_en');
            $table->string('name_ua');
			$table->string('name_ru');
            $table->timestamps();
        });
		
		/* $data = [
			['id' => 1, 'slug' => 'tonns', 'name_ru' => 'тонны']
		];
		
		DB::table('measurement_units')->insert($data); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurement_units');
    }
}
