<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrealGameRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oreal_game_rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reward1')->unsigned()->default(50);
            $table->integer('reward2')->unsigned()->default(50);
            $table->integer('reward3')->unsigned()->default(50);
            $table->integer('reward4')->unsigned()->default(50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oreal_game_rewards');
    }
}
