<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarykaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marykays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('phone');
            $table->string('num')->nullable()->comment('桌号');
            $table->integer('reward')->default(0)->comment('奖品');
            $table->string('show')->nullable()->comment('投票节目');
            $table->boolean('special')->default(0)->comment('特等奖');
            $table->string('openid')->nullable();
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
        Schema::dropIfExists('marykays');
    }
}
