<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrisoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friso_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location')->comment('场次名称');
            $table->boolean('award')->comment('0为纪念奖1为加冕奖');
            $table->enum('category', ['vr', 'kinect'])->comment('游戏类型');
            $table->integer('friso_id')->unsigned();
            $table->foreign('friso_id')->references('id')->on('frisos');
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
        Schema::dropIfExists('friso_logs');
    }
}
