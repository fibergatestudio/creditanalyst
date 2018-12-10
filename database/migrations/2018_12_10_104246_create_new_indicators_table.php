<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // Название показателя, обязательное поле
            $table->string('frequency'); // Частота показателя - за какой период предоставляется блок данных (месяц, квартал, год, возможно - другие варианты)
            $table->string('geography_unit'); // Географическая единица - территориальная величина, на которую предоставляется один блок данных (район, область, регион, возможны другие варианты)
            $table->string('measurement_unit'); // Единица измерения показателя (кг, тонна, гривны и т.д.)
            $table->unsignedInteger('source_id'); // Источник, к которому относится показатель
            $table->foreign('source_id')->references('id')->on('infosources'); // Foreign key для источника, к которому относится показатель
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
        Schema::dropIfExists('new_indicators');
    }
}
