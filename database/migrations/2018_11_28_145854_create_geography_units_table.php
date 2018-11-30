<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateGeographyUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geography_units', function (Blueprint $table) {
            $table->increments('id');
			$table->string('slug');
			$table->string('name_ru');
            $table->timestamps();
        });
		
		$data = [
            ['id' => 1, 'slug' => 'state', 'name_ru' => 'область'],
            ['id' => 2, 'slug' => 'country', 'name_ru' => 'страна'],
		];
		
		DB::table('geography_units')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geography_units');
    }
}
