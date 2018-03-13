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
            $table->boolean('enabled')->default(1);//是否显示
            $table->string('verify');//场次验证码
            $table->enum('category', ['vr', 'kinect'])->comment('游戏类别');
            $table->smallInteger('count')->default(0);//数量统计
            $table->softDeletes();
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
