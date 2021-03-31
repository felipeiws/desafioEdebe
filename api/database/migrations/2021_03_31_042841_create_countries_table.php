<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('continents_id');
            $table->unsignedBigInteger('flags_id');
            $table->unsignedBigInteger('capitals_id');
            $table->timestamps();

            $table->foreign('continents_id')->references('id')->on('continents');
            $table->foreign('flags_id')->references('id')->on('flags');
            $table->foreign('capitals_id')->references('id')->on('capitals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
