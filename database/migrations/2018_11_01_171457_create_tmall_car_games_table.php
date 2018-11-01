<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmallCarGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmall_car_games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('score')->unsigned();
            $table->integer('tmall_car_id')->unsigned();

            $table->foreign('tmall_car_id')
                ->references('id')
                ->on('tmall_cars');
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
        Schema::dropIfExists('tmall_car_games');
    }
}
