<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrealGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oreal_games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->string('username', 20);
            $table->string('phone', 11);
            $table->float('cost')->default(0)->comment('花费时间');
            $table->integer('score')->default(0)->comment('分数');
            $table->smallInteger('game1')->default(0)->comment('是否玩过游戏1');
            $table->smallInteger('game2')->default(0)->comment('是否玩过游戏2');
            $table->smallInteger('game3')->default(0)->comment('是否玩过游戏3-张');
            $table->smallInteger('game4')->default(0)->comment('是否玩过游戏4-郑');
            $table->string('exchange')->nullable();
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
        Schema::dropIfExists('oreal_games');
    }
}
