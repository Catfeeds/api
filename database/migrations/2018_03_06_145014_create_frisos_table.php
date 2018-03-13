<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid',120)->unique();
            $table->string('nickname');
            $table->text('headimg')->nullable();
            //1为获胜，2为失败，3为尚未参加,4为领取过两次奖品
            $table->enum('vr', [1,2,3,4])->default(3)->comment('vr游戏');
            $table->enum('kinect', [1,2,3,4])->default(3)->comment('kinect游戏');
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
        Schema::dropIfExists('frisos');
    }
}
