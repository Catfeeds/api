<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmallCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmall_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone', 11)->unique();
            $table->string('taobao');
            $table->string('sex');
            $table->string('car')->default('00.00.000')->comment('赛车游戏积分');
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
        Schema::dropIfExists('tmall_cars');
    }
}
