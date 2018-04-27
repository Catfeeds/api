<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrisoLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friso_locs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');//场次
            $table->dateTime('start')->comment('开始时间');
            $table->dateTime('end')->comment('结束时间');
            $table->integer('type1')->default(0)->comment('礼品1');
            $table->integer('type2')->default(0)->comment('礼品2');
            $table->integer('type3')->default(0)->comment('礼品3');
            $table->integer('type4')->default(0)->comment('礼品4');
            $table->integer('type5')->default(0)->comment('礼品5');
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
        Schema::dropIfExists('friso_locs');
    }
}
